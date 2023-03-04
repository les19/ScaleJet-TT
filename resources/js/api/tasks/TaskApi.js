import BaseApi from "../BaseApi";

class TaskApi extends BaseApi {

    async store(data){
        return await this.post('/resources/tasks', data);
    }

    async index(){
        return await this.get('/resources/tasks');
    }

    async delete(id){
        return await this.destroy(`/resources/tasks/${id}`);
    }

    async finish(id){
        return await this.post(`/resources/tasks/${id}/finish`, {
            finished: true,
        });
    }

}

export default TaskApi;