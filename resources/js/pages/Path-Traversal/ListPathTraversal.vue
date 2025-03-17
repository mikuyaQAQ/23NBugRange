<template>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Path Traversal</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><router-link to="/admin/home">Home</router-link></li>
                        <li class="breadcrumb-item active">Path Traversal</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">目录遍历</h3>
                    <div class="card-tools">
                    </div>
                </div>

                <div class="card-body">
                    <p class="card-text">
                        目录遍历漏洞是由于网站存在配置缺陷，存在目录可浏览漏洞，这会导致网站很多隐私文件与目录泄露，比如数据库备份文件、配置文件等，攻击者利用该信息可以更容易得到网站权限，导致网站被黑。</p>
                    <h6 class="card-title">风险分析</h6>
                    <p class="card-text">
                        攻击者通过访问网站某一目录时，该目录没有默认首页文件或没有正确设置默认首页文件，将会把整个目录结构列出来，将网站结构完全暴露给攻击者；
                        攻击者可能通过浏览目录结构，访问到某些隐秘文件（如PHPINFO文件、服务器探针文件、网站管理员后台访问地址、数据库连接文件等）
                    </p>
                    <h6>风险等级</h6>
                    <ul>
                        <li>高危：目录可以浏览，泄露包含密码、个人信息等敏感文件。</li>
                        <li> 低危：目录可以浏览，未泄露包含密码、个人信息等敏感文件。</li>
                    </ul>
                    <h6>漏洞挖掘</h6>
                    <p>挖掘目录遍历漏洞有几种方法</p>
                    <ul>
                        <li>可以利用 Web 漏洞扫描器扫描 Web 应用进行检测；</li>
                        <li> 可以在测试时去掉文件名，只访问目录路径</li>
                        <li>也可通过搜索引擎搜索，网站标题包含 “index of” 关键词的网站进行访问。</li>
                    </ul>
                    <h6>漏洞防范</h6>
                    <p>目前存在该漏洞的常见中间件为 Apache 和 IIS，以下列出其相关的修复方式：</p>
                    <ul>
                        <li>IIS 中关闭目录浏览功能：在 IIS 的网站属性中，勾去“目录浏览”选项，重启 IIS。</li>
                        <li> Apache 中关闭目录浏览功能：打开 Apache 配置文件 httpd.conf，查找“Options Indexes FollowSymLinks”，修改为 “ Options
                            -Indexes FollowSymLinks” (减号表示取消），保存退出，重启Apache。</li>
                        <li>Nginx 中默认不会开启目录浏览功能，若您发现当前已开启该功能，可以编辑 nginx.conf 文件，删除如下两行：autoindex on;autoindex_exact_size
                            on;，然后重启Nginx。</li>
                    </ul>
                </div>
                <div class="card-footer">
                    <p></p>
                    <a href="https://www.example.com"></a>
                </div>
            </div>
        </div>
    </div>
</template>