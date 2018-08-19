<el-menu
        :default-openeds="['1', '2', '3']"
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
            <a href="/permissions">
                <el-menu-item index="1-2">权限管理</el-menu-item>
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
            <a href="/tags">
                <el-menu-item index="3-2">文章标签列表</el-menu-item>
            </a>
        </el-menu-item-group>
    </el-submenu>
</el-menu>