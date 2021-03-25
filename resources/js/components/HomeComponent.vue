<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Categories</div>

                    <div class="card-body">
                        <p><a href="add_category">Add Category</a>.</p>

                        <ul v-for="category in categories" :key="categories.id">
                          <li><a :href="`products/${category.id}`">{{ category.name }}</a>
                            <span class="float-right">
                              <a class="btn btn-secondary" :href="`modifyCategory/${category.id}`">Modify</a>&nbsp;
                              <button v-on:click="deleteCategory(category)" class="btn btn-danger">Delete</button>
                            </span>
                          </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
    data () {
        return {
          categories: []
        }
      },
      methods: {
        async read() {
        const baseURI = '/api/getAllCat'
          this.$http.get(baseURI)
          .then((result) => {
          this.categories = result.data
          })
        },

        async deleteCategory(j) {
        const baseURI = '/api/deleteCategory/'+j.id
          this.$http.get(baseURI)
          .then((result) => {
            this.categories = result.data
          })

        }
      },
      created() {
        this.read();
      }
    }
</script>
