<template>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li v-if="pagination.currentPage > 1" class="page-item" @click="$emit( 'on-page-change', pagination.currentPage - 1 )">
                <span class="page-link" >Previous</span>
            </li>

            <li
            v-for=" page in pagination.lastPage "
            :key="page"
            class="page-item"
            @click="$emit( 'on-page-change', page )"
            role="button"
            >
                <span class="page-link"> {{ page }} </span>
            </li>

            <li v-if="pagination.lastPage > pagination.currentPage" class="page-item" @click="$emit( 'on-page-change', pagination.currentPage + 1 )">
                <span class="page-link" >Next</span>
            </li>
        </ul>
    </nav>
</template>

<script>
    export default{
        name: 'Pagination',
        props: [
            'pagination'
        ]
    }
</script>