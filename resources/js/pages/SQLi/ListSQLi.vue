<template>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">SQL Injection</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><router-link to="/admin/home">Home</router-link></li>
                        <li class="breadcrumb-item active">SQL Injection</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">SQL 注入</h3>
                    <div class="card-tools">
                        <!-- Buttons, labels, and many other things can be placed here! -->
                        <!-- Here is a label for example -->

                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div>
                        <h6 class="card-title">SQL注入攻击和防范</h6>
                        <p class="card-text">
                            SQL注入是一种常见的Web应用程序安全漏洞，攻击者利用这种漏洞可以执行恶意的SQL查询或命令，从而造成严重的安全问题。以下是关于SQL注入攻击和防范的重要信息：</p>
                        <h6 class="card-title">原理</h6>
                        <p class="card-text">
                            SQL注入攻击利用应用程序对用户输入参数的不严格处理，将恶意构造的SQL代码插入到输入参数中，然后传递给后台的SQL服务器进行解析和执行。攻击的本质是将用户输入的数据当做代码来执行，导致数据库执行了未经授权的操作。
                        </p>
                        <h6>危害</h6>
                        <ul>
                            <li>盗取网站的敏感信息</li>
                            <li>绕过网站后台认证（如登录验证）</li>
                            <li>提权获取系统权限</li>
                            <li>读取文件信息等敏感数据</li>
                        </ul>
                        <h6>分类</h6>
                        <ul>
                            <li>注入位置分类：GET型、POST型、HEAD型注入</li>
                            <li>反馈结果分类：有回显（显错注入）、无回显（盲注）</li>
                            <li>数据类型分类：数字型、字符型</li>
                        </ul>
                        <h6>防范措施</h6>
                        <ul>
                            <li>使用参数化查询或预编译语句</li>
                            <li>严格验证和过滤用户输入</li>
                            <li>最小化数据库权限</li>
                            <li>对错误消息进行合理处理，避免泄露敏感信息</li>
                        </ul>
                        <h6>检测SQL注入漏洞</h6>
                        <ul>
                            <li>在URL上的等于号传参，输入 `' " \ ()` 查看是否报错</li>
                            <li>输入 `and 1=1` 或 `1=2` 等条件判断</li>
                            <li>判断闭合方式，包括单引号、双引号等</li>
                        </ul>
                        <p class="card-text">以上是关于SQL注入攻击和防范的要点信息。在开发和维护Web应用程序时，务必重视对SQL注入漏洞的检测和防范工作。</p>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <p></p>
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</template>