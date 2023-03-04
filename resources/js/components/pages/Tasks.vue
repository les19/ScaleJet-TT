<template>
    <TaskInput/>
    <TaskList/>
</template>

<script>

import TaskInput from '../tasks/TaskInput.vue';
import TaskList from '../tasks/TaskList.vue';

export default {
    name: 'Tasks',
    components:{
        TaskInput,
        TaskList
    }
}

</script>