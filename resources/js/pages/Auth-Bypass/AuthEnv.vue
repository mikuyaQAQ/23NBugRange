<script setup>

import { ref, onMounted } from 'vue';

const isLoading = ref({
    testRCE: false,
    test2: false,
});

// 从本地存储中获取初始状态
const Auth_DockerComposeUp = ref(localStorage.getItem('Auth_DockerComposeUp') === 'true');
const Auth_test2Up = ref(localStorage.getItem('Auth_test2Up') === 'true');

const test1 = 'test';
const test2 = 'test_2';

const toggleDockerCompose = async (directory) => {
    try {
        isLoading.value[directory] = true;

        if (directory === test1) {

            if (Auth_DockerComposeUp.value) {
                await stopEnvironment(directory);
            } else {
                await startEnvironment(directory);
            }
            Auth_DockerComposeUp.value = !Auth_DockerComposeUp.value;

            // 存储按钮状态
            localStorage.setItem('Auth_DockerComposeUp', Auth_DockerComposeUp.value);
        }

        // test2
        if (directory === test2) {

            if (Auth_test2Up.value) {
                await stopEnvironment(directory);
            } else {
                await startEnvironment(directory);
            }
            Auth_test2Up.value = !Auth_test2Up.value;

            localStorage.setItem('Auth_test2Up', Auth_test2Up.value);
        }

    } catch (error) {

        console.error('Error toggling Docker Compose:', error);

    } finally {

        isLoading.value[directory] = false;

    }
};

const startEnvironment = async (directory) => {
    try {
        await axios.post('/startEnvironment', { directory });
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
    Auth_DockerComposeUp.value = localStorage.getItem('Auth_DockerComposeUp') === 'true';
    Auth_test2Up.value = localStorage.getItem('Auth_test2Up') === 'true';
});

</script>


<template>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">AuthBypass Environment</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">AuthBypass</a></li>
                        <li class="breadcrumb-item active">AuthBypass Environment</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="m-0">CVE-2023-21839 Weblogic未授权</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-title">漏洞介绍</h6>
                    <p class="card-text">WebLogic 存在远程代码执行漏洞（CVE-2023-21839/CNVD-2023-04389），由于Weblogic
                        IIOP/T3协议存在缺陷，当IIOP/T3协议开启时，允许未经身份验证的攻击者通过IIOP/T3协议网络访问攻击存在安全风险的WebLogic Server，漏洞利用成功WebLogic
                        Server可能被攻击者接管执行任意命令导致服务器沦陷或者造成严重的敏感数据泄露。</p>

                    <button @click="toggleDockerCompose(test1)" type="button" class="btn card-link"
                        style="min-width: 100px;" :class="Auth_DockerComposeUp ? 'bg-maroon' : 'btn-primary'"
                        :disabled="isLoading[test1]">
                        <div v-if="isLoading[test1]" class="spinner-border spinner-border-sm" role="status"
                            aria-hidden="true">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <span v-else>{{ Auth_DockerComposeUp ? '关闭环境' : '启动环境' }}</span>
                    </button>

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
                    The body of the card
                </div>
                <!-- /.card-body -->
            </div>
            <!-- test -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="m-0">CVE-test</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-title">card-title test</h6>
                    <p class="card-text">test</p>

                    <button @click="toggleDockerCompose(test2)" type="button" class="btn card-link"
                        style="min-width: 100px;" :class="Auth_test2Up ? 'bg-maroon' : 'btn-primary'"
                        :disabled="isLoading[test2]">
                        <div v-if="isLoading[test2]" class="spinner-border spinner-border-sm" role="status"
                            aria-hidden="true">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <span v-else>{{ Auth_test2Up ? '关闭环境' : '启动环境' }}</span>
                    </button>

                </div>
            </div>
        </div>
    </div>
</template>