<template>
    <div class="tasks-list my-3">
        <div v-for="task in tasks.items" :key="task.uuid">
            <TaskItem
                :text="task.text"
                :date="task.date"
                :uuid="task.uuid"
                :id="task.id"
                :is_finished="task.is_finished"
            />
        </div>
    </div>
</template>

<script>

import { mapState, mapActions } from "vuex";
import TaskItem from "./TaskItem.vue";

export default {
    name: 'TaskList',

    components:{
        TaskItem: TaskItem
    },

    created() {
        this.index();
    },

    computed: {
        ...mapState(['tasks'])
    },


    methods: {
        ...mapActions({
            index: 'tasks/index',
        }),
    }

}

</script>