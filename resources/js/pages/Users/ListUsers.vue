<!-- vue3 使用setup -->
<script setup>
import { onMounted, reactive, ref } from 'vue';

const Users = ref([]);// 加ref变成响应式变量

// Form 对象用于表单数据
const Form = reactive({
    name: '',
    email: '',
    password: '',
});

const getUsers = () => {
    // 使用/api/users 获取数据
    axios.get('/api/users')
        // 获取响应数据,分配给变量Users
        .then(response => {
            // ref 函数返回的是包装过的响应式对象，需要使用 .value 属性来获取或修改实际的值
            Users.value = response.data;
        })
}

// createUser 函数用于创建用户,POST请求
const createUser = () => {
    axios.post('/api/users', Form)
        .then(response => {
            Users.value.unshift(response.data);
            Form.name = '';
            Form.email = '';
            Form.password = '';
            // 隐藏mldel
            $('#createUserModal').modal('hide');
        });
}



// 当组件挂载后，调用 getUsers 函数获取用户数据
onMounted(() => {
    getUsers();
});

</script>



<template>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content">
        <div class="container-fluid">

            <!-- 按钮 -->
            <button type="button" class="mb-2 btn btn-primary" data-toggle="modal" data-target="#createUserModal">
                Add New User
            </button>

            <!-- 表格 -->
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Registered Date</th>
                                <th>Role</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- 使用 v-for 指令遍历 Users 数组 -->
                            <tr v-for="(user, index) in Users" :key="user.id">
                                <!-- 显示当前元素的索引值加一 -->
                                <td>{{ index + 1 }}</td>
                                <td>{{ user.name }}</td> <!-- 动态 -->
                                <td>{{ user.email }}</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <!-- 用户表单 -->
    <div class="modal fade" id="createUserModal" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form autocomplete="off">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input v-model="Form.name" type="text" class="form-control " id="name"
                                aria-describedby="nameHelp" placeholder="Enter full name">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input v-model="Form.email" type="email" class="form-control " id="email"
                                aria-describedby="nameHelp" placeholder="Enter full name">
                        </div>
                    </form>

                    <div class="form-group">
                        <label for="email">Password</label>
                        <input v-model="Form.password" type="password" class="form-control " id="password"
                            aria-describedby="nameHelp" placeholder="Enter password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button @click="createUser" type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</template>