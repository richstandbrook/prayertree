<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div id='prayer-request-table'> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            $('#prayer-request-table').html( apipath );
            console.log('Component ready.')
        }
    }
</script>
