import TaskApi from "../../api/tasks/TaskApi";

const api = new TaskApi;

export default {
    namespaced: true,

    state: {
        items: [],
    },

    actions: {
        async store({ commit }, taskText) {
            const task = await api.store({
                text: taskText
            });
            commit('ADD_TASK', task.task);
        },

        async index({ commit }) {
            const tasks = await api.index();
            commit('ADD_TASKS', tasks.data);
        },

        async delete({ commit }, id) {
            await api.delete(id);
            commit('DELETE_TASK', id);
        },

        async finish({ commit }, id) {
            const task = await api.finish(id);
            commit('UPDATE_TASK', task.task);
        }
    },

    mutations: {

        ADD_TASK(state, data) {
            state.items = [data, ...state.items];
        },

        DELETE_TASK(state, id) {
            state.items = state.items.filter(item => item.id !== id);
        },

        UPDATE_TASK(state, task) {
            state.items = state.items.map(item => {
                if (item.id === task.id) {
                    return task;
                }
                return item;
            });
        },

        ADD_TASKS(state, data) {
            state.items = data;
        },
    }
}