<template>
  <div class="overflow-auto">
    <b-pagination
        v-model="currentPage"
        :total-rows="rows"
        :per-page="perPage"
        aria-controls="my-table"
        align="center"
        size="lg"
        @change="loadPagination"
    ></b-pagination>

    <p class="mt-3">Current Page: {{ currentPage }}</p>

    <b-table
        id="my-table"
        :items="listUsers"
        :per-page="perPage"
        :current-page="currentPage"
        medium
    ></b-table>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        perPage: 3,
        currentPage: 1,
        listUsers: listUsers
      }
    },
    computed: {
      rows() {
        return this.listUsers.length
      }
    },
    methods: {
        loadPagination (selectedPageNumber) {
            if (selectedPageNumber == this.currentPage) {
                console.log('no load')
            } else {
                axios.get('/users/paginate/' , {
                        params: {
                          page: selectedPageNumber
                        }
                    })
                  .then(function (response) {
                    // handle success
                    console.log(response);
                  })
                  .catch(function (error) {
                    // handle error
                    console.log(error);
                  })
                  .finally(function () {
                    // always executed
                  });
            }
        }
    }
  }
</script>