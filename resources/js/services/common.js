export default {
    paginate(paginateUrl, paginateParam) {
        return axios.get(paginateUrl, {params: paginateParam});
    },
    searchUser(searchUserUrl, searchUserParam) {
        return axios.get(searchUserUrl, {params: searchUserParam});
    },
    config() {
        return {
            search_user_option: {
                search_user_for: 'name',
            },
        };
    }
}
