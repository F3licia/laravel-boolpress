<template>
<div class="">

      <form @submit.prevent="filterData">
        <div class="searchBox">

            <div>
              <i class="fas fa-search"></i>
            </div>
          
        
            <div class="sub-box">
                <button type="submit" class="search-label">Cerca per titolo</button>
                <text-input
                  v-model="filters.title"
                ></text-input>
            </div>

            <div class="sub-box">
                <button type="submit" class="search-label">Cerca per contenuto</button>
                <text-input
                  v-model="filters.content"
                ></text-input>
            </div>
            <div class="sub-box annulla-btn">
                <button type="reset" class="my-btn">Annulla</button>
            </div> 
            
        </div>
      </form>

      <div class="display">
          <post-card v-for="post in filteredList" 
            :key="post.id"
            :cover-url="post.cover_url"
            :title="post.title"
            :username="post.username"
            :dateString="post.dateString"
            :categoria="post.categoria"
            :updated-at="post.updated_at"
            :content="post.content"
            :tags="post.tags"
            :link="post.link"

          ></post-card>
      </div>
</div>
</template>


<script>
import TextInput from './formInputs/TextInput.vue';
import postCard from './post-card.vue';

export default {
  components: { postCard, TextInput },
    name:"post-index",

      data() {
        return {
            allPostsList: [],
            filteredList: [],
            filters: {
              title: "",
              content: "",
            }
        };
    },
    methods:{
      filterData() {
            axios
                .get("/api/posts/filter", {
                    params: this.filters
                })
                .then(resp => {
                    this.filteredList = resp.data.results;
                })
                .catch(er => {
                    console.error(er);
                    alert("Si è verificato un errore :(");
                });
        },

    },
    mounted() {
        axios
            .get("/api/posts")
            .then(resp => {
                this.allPostsList = resp.data.results;
                this.filteredList = resp.data.results;
                 console.log(this.allPostsList)
                  
            })
            .catch(er => {
                alert("Si è verificato un errore :(");
            });
    }
}
</script>