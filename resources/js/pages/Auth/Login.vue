<script setup>
import axios from 'axios';
import { reactive, ref } from 'vue';


const form = reactive({
    email: '',
    password: '',
});

// 初始化为 false
const loading = ref(false);


// 动态
const errorMessage = ref('');

const handleSubmit = () => {

    loading.value = true;
    // 清除之前可能存在的错误消息
    errorMessage.value = '';

    // POST请求
    axios.post('/login', form)
        .then(() => {
            // 重定向到/admin/home
            window.location.href = "/admin/home";

        })
        // 报错显示
        .catch((error) => {
            errorMessage.value = "ERROR";
        })

        .finally(() => {
            loading.value = false;
        });
};

</script>


<template>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Welcome</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <h3 class="mb-4 text-center">Account Login</h3>

                        <!-- 错误提示 -->
                        <div v-if="errorMessage" class="alert alert-danger" role="alert">
                            {{ errorMessage }}
                        </div>

                        <!-- 当用户提交表单时，会调用handleSubmit方法来处理表单数据 -->
                        <form @submit.prevent="handleSubmit">
                            <div class="form-group">
                                <input v-model="form.email" type="email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <!-- id="password-field" 使用id标识的目标元素 -->
                                <input v-model="form.password" id="password-field" type="password" class="form-control"
                                    placeholder="Password" required>
                                <!-- 切换密码可见性 -->
                                <!-- toggle="#password-field" 点击图标时要切换可见性的目标元素 -->
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3" :disabled="loading">
                                    <div v-if="loading" class="spinner-border spinner-border-sm" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <span v-else>Sign In</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>