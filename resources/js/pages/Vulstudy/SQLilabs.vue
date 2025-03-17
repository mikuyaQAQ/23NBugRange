<script setup>

import { ref, onMounted } from 'vue';

const isLoading = ref({
    test1: false,
});

const imagePath = ref('');



// 从本地存储中获取初始状态
const DockerComposeUp = ref(localStorage.getItem('DockerComposeUp') === 'true');

const test1 = 'vulstudy/sqli-labs';



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
                    <h1 class="m-0">SQLi-labs</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><router-link to="/admin/home">Home</router-link></li>
                        <li class="breadcrumb-item"><router-link to="/admin/Vulstudy">vulstudy</router-link></li>
                        <li class="breadcrumb-item active">SQLi-labs</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="m-0">SQLi-labs</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-title">靶场介绍</h6>
                    <p class="card-text">它是基于PHP和MySQL数据库实现的靶场，提供Web安全的教学和测试环境。</p>

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
                    <h5 class="card-title">SQLi-labs</h5>
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