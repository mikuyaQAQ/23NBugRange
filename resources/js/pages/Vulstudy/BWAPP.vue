<script setup>

import { ref, onMounted } from 'vue';

const isLoading = ref({
    test1: false,
});

const imagePath = ref('');



// 从本地存储中获取初始状态
const DockerComposeUp = ref(localStorage.getItem('DockerComposeUp') === 'true');

const test1 = 'vulstudy/bWAPP';



const toggleDockerCompose = async (directory) => {
    try {
        isLoading.value[directory] = true;

        if (directory === test1) {

            if (DockerComposeUp.value) {
                await stopEnvironment(directory);

            } else {
                await startEnvironment(directory);

            }
            DockerComposeUp.value = !DockerComposeUp.value;

            // 存储按钮状态
            localStorage.setItem('DockerComposeUp', DockerComposeUp.value);
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
    DockerComposeUp.value = localStorage.getItem('DockerComposeUp') === 'true';
});


</script>


<template>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">bWAPP</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><router-link to="/admin/home">Home</router-link></li>
                        <li class="breadcrumb-item"><router-link to="/admin/Vulstudy">vulstudy</router-link></li>
                        <li class="breadcrumb-item active">bWAPP</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="m-0">bWAPP（Buggy Web Application）</h5>
                </div>
                <div class="card-body">
                    <img src="/images/bWAPP.png" style="max-width: 70%; height: auto; display: block; margin: auto;">
                    <p class="card-text">bWAPP（Buggy Web
                        Application）是一个开放源代码的Web应用程序，专为安全教育和研究而设计。它旨在帮助开发人员、学生、研究人员和安全爱好者学习和实践各种网络安全漏洞和攻击技术。</p>
                    <p class="card-text">由于bWAPP的设计目的是为了学习和演练安全漏洞，用户可以在实验环境中探索这些漏洞，并通过测试、分析和修复，学习如何预防和应对这些攻击。</p>
                    <p class="card-text">
                        bWAPP通常用于安全培训和教育，包括网络安全课程、渗透测试练习、捕旗比赛和安全研究。重要的是，bWAPP只应在实验或受控环境中使用，不应在生产环境中部署或用于未经授权的渗透测试。</p>

                    <button @click="toggleDockerCompose(test1)" type="button" class="btn card-link"
                        style="min-width: 100px;" :class="DockerComposeUp ? 'bg-maroon' : 'btn-primary'"
                        :disabled="isLoading[test1]">
                        <div v-if="isLoading[test1]" class="spinner-border spinner-border-sm" role="status"
                            aria-hidden="true">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <span v-else>{{ DockerComposeUp ? '关闭环境' : '启动环境' }}</span>
                    </button>
                    <div v-if="DockerComposeUp && imagePath">
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
                    <h5 class="card-title">bWAPP</h5>
                    <p class="card-text">
                        【漏洞】SQL注入<br>
                        【难度】low<br>
                        【解题过程】

                    </p>

                </div>
                <!-- /.card-body -->
            </div>

        </div>
    </div>
</template>