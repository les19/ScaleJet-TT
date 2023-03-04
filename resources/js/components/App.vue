<template>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 col-12">
                <router-view></router-view>
            </div>
        </div>
    </div>

</template>

<script>

import Tasks from './pages/Tasks.vue';
import '../../sass/style.scss';

export default {
    name: 'App',
    components: {
        Tasks: Tasks
    }
}


</script>