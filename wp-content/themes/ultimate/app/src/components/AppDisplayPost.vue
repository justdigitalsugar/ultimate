<template>
    <div>
        <h2 class="h2">Contacts</h2>
        <div class="border">
            <div v-for="post in postData" :key="post.id" class="contactitem">
                <div>
                    <h2>{{ post.last_name }}, {{ post.first_name }}</h2>
                    <p>{{ post.email }} / {{ post.phone }}</p>
                </div>
                <div>
                    <a :href="post.link" class="button-user">View contact</a>
                </div>
            </div>

           
        </div>
         <!-- Pagination controls -->
         <div class="pagination">
                <p>Page {{ currentPage }} of {{ totalPages }}</p>
                <button @click="previousPage" :disabled="currentPage === 1">Previous</button>
                <button @click="nextPage" :disabled="currentPage === totalPages">Next</button>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            currentPage: 1,
            perPage: 5,
            totalItems: 0,
            postData: [],
            wpData: wpData
        };
    },
    mounted() {
        this.fetchContacts();
    },
    methods: {
        fetchContacts() {
            fetch(
                `${this.wpData.rest_url}/wp/v2/contacts?page=${this.currentPage}&per_page=${this.perPage}`
            )
                .then((response) => {
                    this.totalItems = response.headers.get('X-WP-Total');
                    return response.json();
                })
                .then((data) => {
                    this.postData = data.map((post) => ({
                        id: post.id,
                        title: post.title,
                        first_name: post.acf.first_name,
                        last_name: post.acf.last_name,
                        email: post.acf.email,
                        phone: post.acf.phone,
                        link: post.link
                    }));
                });
        },
        previousPage() {
            if (this.currentPage > 1) {
                this.currentPage--;
                this.fetchContacts();
            }
        },
        nextPage() {
            if (this.currentPage < this.totalPages) {
                this.currentPage++;
                this.fetchContacts();
            }
        }
    },
    computed: {
        totalPages() {
            return Math.ceil(this.totalItems / this.perPage);
        },
        paginatedData() {
            const startIndex = (this.currentPage - 1) * this.perPage;
            const endIndex = startIndex + this.perPage;
            return this.postData.slice(startIndex, endIndex);
        }
    }
};
</script>