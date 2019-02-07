<style>
    #cnd_search {
        width: 80px;
        -webkit-transition: width 0.5s ease-in-out;
        -moz-transition:width 0.5s ease-in-out;
        -o-transition: width 0.5s ease-in-out;
        transition: width 0.5s ease-in-out;
        position:absolute;
    }

    #cnd_search:focus{
        width: 250px;
    }

    #navbar-search-form {
        padding-right: 0;
    }
</style>

<form id="navbar-search-form" action="search/" class="{*hidden-sm hidden-xs*} navbar-form navbar-left" role="search" method="get">
    {*<input type="hidden" name="search" value="{$smarty.const.SEARCH_SRC_DEMANDS}" />*}
    <div class="input-group">
        <input id="cnd_search" type="text" class="form-control" name="text" placeholder="{L::navbar_global_search}...">
        <span class="input-group-btn">
            {*<button class="btn btn-{if $conditions}success{else}default{/if}" type="button" data-target="#modal-remote" data-remote="demands/search/" data-toggle="modal"><i class="fa fa-expand"></i></button>
            {if $conditions}
                <a href="demands/" class="btn btn-default" type="submit"><i class="fa fa-times"></i></a>
            {/if}*}
            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
            <button class="btn-search-collapse btn btn-default" style="display: none;" onclick="$('#cnd_search').blur(); return false;"><i class="fa fa-times"></i></button>
        </span>
    </div>
</form>

<script>
    $('body').bind('init.layout', function(event){

        $("#cnd_search").on("focus", function() {
            $("#navbar-search-form").find(".btn-search-collapse").show();
            $("#navbar-search-form").find("button[type=submit]").toggleClass("btn-default btn-success");
            $("#navbar-top .navbar-nav").stop().fadeOut();
        }).on("blur", function() {
            $("#navbar-search-form").find(".btn-search-collapse").hide();
            $("#navbar-search-form").find("button[type=submit]").toggleClass("btn-default btn-success");
            $("#navbar-top .navbar-nav").stop().fadeIn();
        });

        function get_qs_source() {
            return new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                remote: {
                    url: 'demands/search/%QUERY.json',
                    wildcard: '%QUERY'
                }
            });
        }

        $("#cnd_search").typeahead({
                    hint: true,
                    highlight: true,
                    minLength: 3
                },
                {
                    name: 'qs-demands',
                    limit: 5,
                    display: 'value',
                    source: get_qs_source(),
                    {literal}
                    templates: {
                        header: '<h3 class="league-name">Заявки</h3>',
                        suggestion: function(data) {
                            return '<div>'+data.value+'</div>';
                        }
                    }
                    {/literal}
                }
        );


        $("#cnd_search").bind('typeahead:selected', function(obj, datum, name) {
            //console.log(datum);
            {if $controller_name == "demands"}
            DemandIW.find(datum.id, "{$conditions|http_build_query:"cnd"}{if $conditions}&{/if}{$sort|http_build_query:"sort"}", datum.link);
            {else}
            location.href = datum.link;
            {/if}
        });

    });

</script>
