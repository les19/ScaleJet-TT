<template>
    <form class="py-3 sticky-top bg-white">
        <div class="row">
            <div class="col-md-9 col-12">
                <div class="form-floating">
                    <input v-model="text" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">
                        {{ trans('Type task') }}
                    </label>
                </div>
            </div>
            <div class="col-md-3 col-12 d-flex justify-content-end">
                <button @click.prevent="storeTask" class="btn p-3 btn-primary w-100 my-md-0 my-3">
                    {{ trans('Create') }}
                </button>
            </div>
        </div>
    </form>
</template>

<script>

import { mapActions } from "vuex";

export default {
    name: 'TaskInput',

    data(){
        return {
            /**
             * @type String
             */
            text: ''
        }
    },

    methods:{
        ...mapActions({
            store: 'tasks/store',
            index: 'tasks/index',
        }),

        /**
         * Store new task from input
         */
        storeTask(){
            this.store(this.text)
                .then(() => {
                    this.clearText();
                    this.index();
                })
        },

        clearText(){
            this.text = '';
        },  
    }
}

</script>
