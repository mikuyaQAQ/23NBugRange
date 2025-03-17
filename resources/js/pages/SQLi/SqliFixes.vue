<script setup></script>


<template>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">SQLi Fixes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><router-link to="/admin/home">Home</router-link></li>
                        <li class="breadcrumb-item"><a href="#">SQL Injection</a></li>
                        <li class="breadcrumb-item active">SQLi Fixes</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">CVE-2023-25157 GeoServer SQL 注入漏洞修复</h3>
                    <div class="card-tools">
                        <!-- Buttons, labels, and many other things can be placed here! -->
                        <!-- Here is a label for example -->

                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <p class="card-text">目前 GeoServer 和 Geotools 官方均已发布修复版本，查看 GeoServer 官方提交的补丁，在
                        src/community/jdbcconfig/src/main/java/org/geoserver/jdbcconfig/internal/ConfigDatabase.java中添加了模块org.geoserver.jdbcloader.JDBCLoaderProperties模块用于配置文件
                        jdbcconfig/jdbcconfig.properties中的 JDBCConfig 模块属性字段并更改了构造函数以包含此属性字段。</p>
                    <img src="/images/geo2.jpg" style="width: 600px;display: block; margin-left: auto;margin-right: auto;">
                    <p class="card-text">
                        还修改了src/community/jdbcconfig/src/main/java/org/geoserver/jdbcconfig/internal/OracleDialect.java中的插入语法
                    </p>
                    <p class="card-text">而在 GeoTools 提交的补丁中，修改
                        modules/library/jdbc/src/main/java/org/geotools/data/jdbc/FilterToSQL.java添加了EscapeSql模块和
                        escapeBackslash字段对 SQL 注入进行防御</p>
                </div>

                <!-- /.card-body -->
                <!-- <div class="card-footer">
                    The footer of the card
                </div> -->
                <!-- /.card-footer -->
            </div>
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">CVE-2023-52064 五指CMS SQL注入漏洞修复</h3>
                    <div class="card-tools">
                        <!-- Buttons, labels, and many other things can be placed here! -->
                        <!-- Here is a label for example -->

                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <p class="card-text">官方暂时未发布最新补丁
                    </p>
                    <p class="card-text">添加Waf，以及关键字过滤</p>

                </div>

                <!-- /.card-body -->
                <!-- <div class="card-footer">
                    The footer of the card
                </div> -->
                <!-- /.card-footer -->
            </div>

        </div>
    </div>
</template>