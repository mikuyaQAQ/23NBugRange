<script setup></script>


<template>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Sudo Privilege Escalation Fixes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><router-link to="/admin/home">Home</router-link></li>
                        <li class="breadcrumb-item"><a href="#">Sudo Privilege Escalation</a></li>
                        <li class="breadcrumb-item active">Sudo Privilege Escalation Fixes</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">漏洞修复</h3>
                    <div class="card-tools">
                        <!-- Buttons, labels, and many other things can be placed here! -->
                        <!-- Here is a label for example -->

                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <h5 class="card-title">只需把受影响的环境变量添加到拒绝列表中。</h5>

                    <p class="card-text">defaults!SUDOEDIT env_delete+="SUDO_EDITOR VISUAL EDITOR"
                    </p>
                    <p class="card-text">Cmnd_Alias SUDOEDIT = sudoedit /etc/custom/service.conf</p>
                    <p class="card-text">user ALL=(ALL:ALL) SUDOEDIT
                    </p>


                </div>
                <!-- /.card-body -->
                <div class="card-footer">

                </div>
                <!-- /.card-footer -->
            </div>

        </div>
    </div>
</template>