<el-aside width="220px" style="border-top: 1px solid #222">
    <el-menu
            :default-openeds="['1', '2', '3', '4', '5']"
            background-color="#343a40"
            text-color="#fff"
            active-text-color="#ffd04b"
    >
        <el-submenu index="1">
            <template slot="title"><i class="el-icon-setting"></i>系统管理</template>
            <el-menu-item-group>
                <a href="/admins">
                    <el-menu-item index="1-1">管理员管理</el-menu-item>
                </a>
                <a href="/admin-permissions">
                    <el-menu-item index="1-2">权限管理</el-menu-item>
                </a>
                <a href="/messages">
                    <el-menu-item index="1-3">反馈消息</el-menu-item>
                </a>
                <a href="/">
                    <el-menu-item index="1-4">系统日志</el-menu-item>
                </a>
                <a href="/dashboard">
                    <el-menu-item index="1-5">系统监控</el-menu-item>
                </a>
                <a href="/clear-cache">
                    <el-menu-item index="1-6">缓存清理</el-menu-item>
                </a>
            </el-menu-item-group>
        </el-submenu>
        <el-submenu index="2">
            <template slot="title"><i class="el-icon-printer"></i>用户管理</template>
            <el-menu-item-group>
                <a href="/users">
                    <el-menu-item index="2-1">用户列表</el-menu-item>
                </a>
            </el-menu-item-group>
        </el-submenu>
        <el-submenu index="3">
            <template slot="title"><i class="el-icon-document"></i>文章管理</template>
            <el-menu-item-group>
                <a href="/posts">
                    <el-menu-item index="3-1">文章列表</el-menu-item>
                </a>
                <a href="/comments">
                    <el-menu-item index="3-2">评论列表</el-menu-item>
                </a>
                <a href="/tags">
                    <el-menu-item index="3-3">文章标签列表</el-menu-item>
                </a>
            </el-menu-item-group>
        </el-submenu>
        <el-submenu index="4">
            <template slot="title"><i class="el-icon-document"></i>APP管理</template>
            <el-menu-item-group>
                <a href="/posts">
                    <el-menu-item index="4-1">极光推送</el-menu-item>
                </a>
            </el-menu-item-group>
        </el-submenu>
        <el-submenu index="5">
            <template slot="title"><i class="el-icon-document"></i>发送通知</template>
            <el-menu-item-group>
                <a href="/announcement">
                    <el-menu-item index="5-1">发布公告</el-menu-item>
                </a>
                <a href="/sms-notify">
                    <el-menu-item index="5-2">发送短信</el-menu-item>
                </a>
            </el-menu-item-group>
        </el-submenu>
    </el-menu>
</el-aside>