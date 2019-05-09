<template>
  <div class="overflow-auto">
    <b-pagination
        v-model="currentPage"
        :total-rows="total"
        :per-page="perPage"
        aria-controls="my-table"
        align="center"
        size="lg"
        @change="loadPagination"
    ></b-pagination>

    <p class="mt-3">Current Page: {{ currentPage }}</p>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Created at</th>
          <th scope="col">Updated at</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="item in listPaginatedUsers">
          <th scope="row">{{ item.id }}</th>
          <td>{{ item.name }}</td>
          <td>{{ item.email }}</td>
          <td>{{ item.created_at }}</td>
          <td>{{ item.updated_at }}</td>
        </tr>
      </tbody>
    </table>

  </div>
</template>

<script>
    import Common from '../../services/common';

    export default {
        data() {
            return {
                perPage: perPage,
                currentPage: currentPage,
                listPaginatedUsers: listPaginatedUsers,
                total: total,
                paginateUrl: laroute.route('users.index'),
            }
        },
        computed: {
            rows() {
                return this.listPaginatedUsers.length
            }
        },
        methods: {
            loadPagination (selectedPageNumber) {
                if (selectedPageNumber == this.currentPage) {
                    console.log('no load')
                } else {
                    let paginateParams = {
                        page: selectedPageNumber
                    };
                    Common.paginate(this.paginateUrl, paginateParams)
                        .then( response => {
                            this.listPaginatedUsers = response.data.listPaginatedUsers;
                            this.currentPage = response.data.currentPage;
                            this.total = response.data.total;
                            this.perPage = response.data.perPage;
                        })
                        .catch(error => {
                            console.log(error);
                        })
                }      
            }
        }
    }
</script>
