export default {
    paginate(paginateUrl, paginateParam) {
        return axios.get(paginateUrl, {params: paginateParam});
    },
    config() {
        return {

        };
    }
}
