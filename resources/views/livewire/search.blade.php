<style>
    h3 {
        text-align: center;
        margin: 20px auto;
    }

    .content {
        text-align: center;
    }

    a {
        color: #333;
    }

    .header-title {
        padding: 5px 10px;
        background: #dadada;
        font-weight: bold;
    }
</style>
<div>

    <div class="flex-center position-ref full-height m-3">
        <div class="content">
            <form class="typeahead" role="search" wire:submit="searchCustomer">
                {{$search}}
                <input type="search" name="q" class="form-control search-input" placeholder="Type something...">
                <button class="btn btn-primary">search</button>
            </form>
        </div>
    </div>
    
   
   

    <script type="text/javascript">
        $(document).ready(function($) {
            var engine1 = new Bloodhound({
                    remote: {
                        url: '/search/name?value=%QUERY%',
                        wildcard: '%QUERY%'
                    },
                    datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
                    queryTokenizer: Bloodhound.tokenizers.whitespace
                }

            );
            $(".search-input").typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            }, [{
                source: engine1.ttAdapter(),
                name: 'customer-name',
                display: function(data) {
                    return data.name;
                },
                templates: {
                    empty: [
                        '<div class="header-title">Name</div><div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                    ],
                    header: [
                        '<div class="header-title">Name</div><div class="list-group search-results-dropdown"></div>'
                    ],
                    suggestion: function(data) {
                        return '<a href="/customer/' + data.id + '" class="list-group-item">' + data.name + '</a>';
                    }
                }
            }]);
        });
    </script>

</div>