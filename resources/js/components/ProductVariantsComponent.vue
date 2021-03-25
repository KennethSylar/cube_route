<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><a href="javascript:history.back()">Back</a>&nbsp;&nbsp;&nbsp;Variants</div>

                    <div class="card-body">
                        <p><a :href="`add_variant/${apiData['id']}`">Add Variant</a>.</p>
                        <ul v-for="variant in apiData['variants']" :key="variant.id">
                          <li>{{ variant.name }}
                            <span class="float-right">
                              <a class="btn btn-secondary" :href="`modifyVariant/${variant.id}`">Modify</a>&nbsp;
                              <button v-on:click="deleteCategory(variant)" class="btn btn-danger">Delete</button>
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
        props: {
          apiData: {
            type: Array,
          }
        },

      methods: {
        async deleteCategory(j) {
        const baseURI = '/api/deleteVariant/'+j.id
          this.$http.get(baseURI)
          .then((result) => {
            location.reload();
          })

        }
      },

    }
</script>
