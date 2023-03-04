<template>

    <div class="task-list__item w-100 p-3 rounded mb-3" :class="!is_finished ? 'border-primary' : 'border-success'" :id="uuid">
            <div class="row">
                <div class="col">
                    <p class="m-0">
                        {{ text }}
                    </p>
                </div>
                <div class="col text-end">
                    <small>{{ date }}</small>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="d-flex task-list__item__buttons mt-3 justify-content-end">
                        <button @click="finishTask" v-if="!is_finished" class="btn btn-success">{{ trans('Finish') }}</button>
                        <button @click="deleteTask" class="btn btn-danger">{{ trans('Delete') }}</button>
                    </div>
                </div>
            </div>
        </div>

</template>

<script>

import { mapActions } from "vuex";

export default {
    name: 'TaskItem',

    props:{
        text: String,
        date: String,
        uuid: String,
        id: Number,
        is_finished: Boolean,
    },

    methods: {
        ...mapActions({
            delete: 'tasks/delete',
            finish: 'tasks/finish',
        }),

        deleteTask(){
            this.delete(this.id);
        },

        finishTask(){
            this.finish(this.id);
        },
    }

}

</script>