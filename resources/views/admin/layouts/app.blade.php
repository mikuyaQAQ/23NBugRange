<!DOCTYPE html>

<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>23NBug</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper" id="app">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item" id="toggleMenuIcon">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

        </nav>


        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- 靶场名 -->
            <a href="#" class="brand-link">
                <img src="/images/logo.png" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">23NBug Range</span>
            </a>

            <div class="sidebar">
                <!-- 作者名 -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="/images/waifu.jpeg" class="img-circle elevation-2">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Mikuya</a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <!------------------------ 左侧导航 ----------------------------->

                        <li class="nav-item">
                            <router-link to="/admin/home" active-class="active" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    靶场介绍
                                </p>
                            </router-link>
                        </li>

                        <li class="nav-item">
                            <router-link to="/admin/sqli" active-class="active" class="nav-link">
                                <i class="nav-icon fas fa-database"></i>
                                <p>
                                    SQL 注入
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </router-link>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link to="/admin/sqli/sqliEnv" active-class="active" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>实战环境</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/admin/sqli/sqliFixes" active-class="active" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>漏洞修复</p>
                                    </router-link>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <router-link to="/admin/RCE" active-class="active" class="nav-link">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    命令执行
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </router-link>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link to="/admin/RCE/rceEnv" active-class="active" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>实战环境</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/admin/RCE/rceFixes" active-class="active" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>漏洞修复</p>
                                    </router-link>
                                </li>
                            </ul>
                        </li>

                        <!-- <li class="nav-item">
                            <router-link to="/admin/Auth-Bypass" active-class="active" class="nav-link">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    身份绕过
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </router-link>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link to="/admin/Auth-Bypass/AuthEnv" active-class="active" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>实战环境</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/admin/Auth-Bypass/AuthFixes" active-class="active"
                                        class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>漏洞修复</p>
                                    </router-link>
                                </li>
                            </ul>
                        </li> -->

                        <li class="nav-item">
                            <router-link to="/admin/Path-Traversal" active-class="active" class="nav-link">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                目录遍历
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </router-link>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link to="/admin/Path-Traversal/PathTverEnv" active-class="active"
                                        class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>实战环境</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/admin/Path-Traversal/PathTverFixes" active-class="active"
                                        class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>漏洞修复</p>
                                    </router-link>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <router-link to="/admin/Sudo-PE" active-class="active" class="nav-link">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    权限提升
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </router-link>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link to="/admin/Sudo-PE/SudoEnv" active-class="active" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>实战环境</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/admin/Sudo-PE/SudoFixes" active-class="active" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>漏洞修复</p>
                                    </router-link>
                                </li>
                            </ul>
                        </li>
                        <!-- vulstudy项目 -->
                        <li class="nav-item">
                            <router-link to="/admin/Vulstudy" active-class="active" class="nav-link">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    综合靶场
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </router-link>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link to="/admin/Vulstudy/DVWA" active-class="active" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>DVWA</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/admin/Vulstudy/BWAPP" active-class="active" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>bWAPP</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/admin/Vulstudy/SQLi-labs" active-class="active" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>SQLi-labs</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/admin/Vulstudy/Mutillidae" active-class="active" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>mutillidae</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/admin/Vulstudy/BodgeIt" active-class="active" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>BodgeIt</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/admin/Vulstudy/WackoPicko" active-class="active" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>WackoPicko</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/admin/Vulstudy/WebGoat" active-class="active" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>WebGoat</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/admin/Vulstudy/Hackademic" active-class="active" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Hackademic</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/admin/Vulstudy/XSSed" active-class="active" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>XSSed</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/admin/Vulstudy/DSVW" active-class="active" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>DSVW</p>
                                    </router-link>
                                </li>
                            </ul>
                        </li>
                        <!-- ---------- -->

                        <li class="nav-item">
                            <!-- POST方式提交；目标路由logout -->
                            <form method="POST" action="{{ route('logout') }}" class="nav-link">
                                <!-- 防止跨站请求伪造攻击 -->
                                @csrf
                                <!-- onclick js事件函数，点击触发。
                                解释：点击时不跳转，然后找到最近的表单元素，调用 submit() 方法提交表单 -->
                                <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                                    <i class="nav-icon fas fa-sign-out-alt"></i>
                                    <p>Logout</p>
                                </a>
                            </form>
                        </li>

                        <!------------------------TEST ----------------------------->
                        <!-- <li class="nav-item">
                            <router-link to="/admin/users" active-class="active" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Users
                                </p>
                            </router-link>
                        </li> -->

                    </ul>
                </nav>

            </div>

        </aside>

        <div class="content-wrapper">
            <router-view></router-view>
        </div>


        <footer class="main-footer">

            <div class="float-right d-none d-sm-inline">
                New Bug CVE
            </div>

            <strong>Mikuya &copy; 2023-2024 .</strong> All rights reserved.
        </footer>
    </div>

    <script>
        // addEventListener监听，DOMContentLoaded事件，所有内容已经加载完成并解析之后触发
        document.addEventListener('DOMContentLoaded', () => {
            // 获取Id为toggleMenuIcon 并存储在toggleMenuIcon 常量
            const toggleMenuIcon = document.getElementById('toggleMenuIcon');
            // document.querySelector 查找body元素并存储在body常量
            const body = document.querySelector('body');

            toggleMenuIcon.addEventListener('click', () => {
                // 判断当前侧边栏是否处于折叠状态
                if (body.classList.contains('sidebar-collapse')) {
                    // localStorage:本地存储在用户的浏览器中
                    // 记录侧边栏状态：展开
                    localStorage.setItem('sidebarState', 'expanded');
                } else {
                    // 记录侧边栏状态：折叠
                    localStorage.setItem('sidebarState', 'collapsed');
                }
            });
            // 获取侧边栏状态
            const sidebarState = localStorage.getItem('sidebarState');
            //   状态为折叠（默认下是展开，无需设置展开操作）
            if (sidebarState === 'collapsed') {
                // 在body中添加一个 侧边栏折叠状态的 class
                body.classList.add('sidebar-collapse');
            }
        });
    </script>

</body>

</html>