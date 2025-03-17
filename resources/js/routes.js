import Home from './components/Home.vue';
import ListSQLi from './pages/SQLi/ListSQLi.vue';
import ListRCE from './pages/RCE/ListRCE.vue';
import ListAuthBypass from './pages/Auth-Bypass/ListAuthBypass.vue';
import ListPathTraversal from './pages/Path-Traversal/ListPathTraversal.vue';
import ListSudoPE from './pages/Sudo-PE/ListSudoPE.vue';
import Login from './pages/Auth/Login.vue';

import ListVulstudy from './pages/Vulstudy/ListVulstudy.vue';


// sqli
import SqliEnv from './pages/SQLi/SqliEnv.vue';
import SqliFixes from './pages/SQLi/SqliFixes.vue';

// rce
import RceEnv from './pages/RCE/RceEnv.vue';
import RceFixes from './pages/RCE/RceFixes.vue';

// auth-bypass
import AuthEnv from './pages/Auth-Bypass/AuthEnv.vue';
import AuthFixes from './pages/Auth-Bypass/AuthFixes.vue';

// unauth-access
import PathTverEnv from './pages/Path-Traversal/PathTverEnv.vue';
import PathTverFixes from './pages/Path-Traversal/PathTverFixes.vue';

// sudo-pe
import SudoEnv from './pages/Sudo-PE/SudoEnv.vue';
import SudoFixes from './pages/Sudo-PE/SudoFixes.vue';

// vulstudy
import Dvwa from './pages/Vulstudy/DVWA.vue';
import BWAPP from './pages/Vulstudy/BWAPP.vue';
import SQLilabs from './pages/Vulstudy/SQLilabs.vue';
import Mutillidae from './pages/Vulstudy/Mutillidae.vue';
import Bodgeit from './pages/Vulstudy/Bodgeit.vue';
import WackoPicko from './pages/Vulstudy/WackoPicko.vue';
import WebGoat from './pages/Vulstudy/WebGoat.vue';
import Hackademic from './pages/Vulstudy/Hackademic.vue';
import XSSed from './pages/Vulstudy/XSSed.vue';
import DSVW from './pages/Vulstudy/DSVW.vue';


// TEST
// import ListUsers from './pages/Users/ListUsers.vue';

// 默认导出
export default [

    {
        path: '/login',
        name: 'admin.login',
        component: Login,
    },

    {
        path: '/admin/home',
        name: 'admin.home',
        component: Home,
    },

    {
        path: '/admin/sqli',
        name: 'admin.sqli',
        component: ListSQLi,
    },

    {
        path: '/admin/sqli/sqliEnv',
        name: 'admin.sqli.sqliEnv',
        component: SqliEnv,
    },

    {
        path: '/admin/sqli/sqliFixes',
        name: 'admin.sqli.sqliFixes',
        component: SqliFixes,
    },


    {
        path: '/admin/RCE',
        name: 'admin.RCE',
        component: ListRCE,
    },

    {
        path: '/admin/RCE/rceEnv',
        name: 'admin.RCE.rceEnv',
        component: RceEnv,
    },

    {
        path: '/admin/RCE/rceFixes',
        name: 'admin.RCE.rceFixes',
        component: RceFixes,
    },


    {
        path: '/admin/Auth-Bypass',
        name: 'admin.Auth-Bypass',
        component: ListAuthBypass,
    },

    {
        path: '/admin/Auth-Bypass/AuthEnv',
        name: 'admin.Auth-Bypass.AuthEnv',
        component: AuthEnv,
    },

    {
        path: '/admin/Auth-Bypass/AuthFixes',
        name: 'admin.Auth-Bypass.AuthFixes',
        component: AuthFixes,
    },


    {
        path: '/admin/Path-Traversal',
        name: 'admin.Path-Traversal',
        component: ListPathTraversal,
    },

    {
        path: '/admin/Path-Traversal/PathTverEnv',
        name: 'admin.Path-Traversal.PathTverEnv',
        component: PathTverEnv,
    },

    {
        path: '/admin/Path-Traversal/PathTverFixes',
        name: 'admin.Path-Traversal.PathTverFixes',
        component: PathTverFixes,
    },


    {
        path: '/admin/Sudo-PE',
        name: 'admin.Sudo-PE',
        component: ListSudoPE,
    },

    {
        path: '/admin/Sudo-PE/SudoEnv',
        name: 'admin.Sudo-PE.SudoEnv',
        component: SudoEnv,
    },

    {
        path: '/admin/Sudo-PE/SudoFixes',
        name: 'admin.Sudo-PE.SudoFixes',
        component: SudoFixes,
    },
    // -------- vulstudy项目 -----------
    {
        path: '/admin/Vulstudy',
        name: 'admin.Vulstudy',
        component: ListVulstudy,
    },

    {
        path: '/admin/Vulstudy/DVWA',
        name: 'admin.Vulstudy.DVWA',
        component: Dvwa,
    },

    {
        path: '/admin/Vulstudy/BWAPP',
        name: 'admin.Vulstudy.BWAPP',
        component: BWAPP,
    },

    {
        path: '/admin/Vulstudy/SQLi-labs',
        name: 'admin.Vulstudy.SQLi-labs',
        component: SQLilabs,
    },

    {
        path: '/admin/Vulstudy/Mutillidae',
        name: 'admin.Vulstudy.Mutillidae',
        component: Mutillidae,
    },

    {
        path: '/admin/Vulstudy/BodgeIt',
        name: 'admin.Vulstudy.BodgeIt',
        component: Bodgeit,
    },

    {
        path: '/admin/Vulstudy/WackoPicko',
        name: 'admin.Vulstudy.WackoPicko',
        component: WackoPicko,
    },

    {
        path: '/admin/Vulstudy/WebGoat',
        name: 'admin.Vulstudy.WebGoat',
        component: WebGoat,
    },

    {
        path: '/admin/Vulstudy/Hackademic',
        name: 'admin.Vulstudy.Hackademic',
        component: Hackademic,
    },

    {
        path: '/admin/Vulstudy/XSSed',
        name: 'admin.Vulstudy.XSSed',
        component: XSSed,
    },

    {
        path: '/admin/Vulstudy/DSVW',
        name: 'admin.Vulstudy.DSVW',
        component: DSVW,
    }


    // TEST
    // {
    //     path: '/admin/users',
    //     name: 'admin.users',
    //     component: ListUsers,
    // }
]