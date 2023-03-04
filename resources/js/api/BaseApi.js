class BaseApi {

    async post(url, data){
        let result = await window.axios.post(
            url, data
        );

        return result?.data;
    }

    async get(url){
        let result = await window.axios.get(url);

        return result?.data;
    }

    async destroy(url){
        let result = await window.axios.delete(url);

        return result?.data;
    }

}

export default BaseApi;