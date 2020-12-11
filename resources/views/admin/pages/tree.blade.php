@extends('admin::layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">@lang('Страницы')</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div id="jstree"></div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('#jstree')
            .on('delete_node.jstree', function(event, obj) {
                if (parseInt(obj.node.id)) {
                    $.ajax("{{ url('admin/pages/tree/delete') }}",
                        {
                            data: {id:obj.node.id},
                        }
                    );
                }
            })
            .on('rename_node.jstree', function(event, obj) {
                if (parseInt(obj.node.id)) {
                    $.ajax("{{ url('admin/pages/tree/rename') }}",
                        {
                            data: {id:obj.node.id, name:obj.text},
                        }
                    );
                }
            })
            .on('move_node.jstree', function(event, obj) {
                $.ajax("{{ url('admin/pages/tree/move') }}",
                    {
                        data: {id:obj.node.id, parent:obj.parent, position:obj.position, old_parent:obj.old_parent, old_position:obj.old_position},
                    }
                );
            })
            .jstree({
                core: {
                    check_callback: true,
                    data: {
                        'url' : function (node) {
                            return '';
                        },
                        'data' : function (node) {
                            return { 'id' : node.id };
                        }
                    },
                },
                plugins: ['types', 'dnd', 'contextmenu', 'wholerow', 'state'],
                types: {
                    page: {
                        valid_children: ['page'],
                    },
                },
                contextmenu: {
                    items: function(node) {
                        var items = $.jstree.defaults.contextmenu.items();
                        delete items.ccp;

                        var removeAction = items.remove.action;
                        items.remove.action = function(event, obj) {
                            if (confirm("Are you sure?")) {
                                removeAction.call(this, event, obj);
                            }
                        }
                        var createAction = items.create.action;
                        items.create.action = function(data) {
                            var inst = $.jstree.reference(data.reference),
                                obj = inst.get_node(data.reference);

                            inst.create_node(obj, {"type":"page"}, "last", function (new_node) {
                                new_node.a_attr.style = 'opacity:.5';
                                inst.edit(new_node, "",
                                    function(node) {
                                        if (node.text) {
                                            $.ajax("{{ url('admin/pages/tree/create') }}",
                                                {
                                                    data: {name:node.text, parent:node.parent},
                                                    dataType:"json",
                                                    success: function(data) {
                                                        inst.set_id(node, data["id"]);
                                                    }
                                                }
                                            );
                                        } else {
                                            inst.delete_node(node);
                                        }
                                    }
                                );
                            });
                        }

                        items.update = {
                            label:"Update",
                            action: function(data) {
                                var inst = $.jstree.reference(data.reference),
                                    obj = inst.get_node(data.reference);
                                location.href=("{{ route('admin.pages.edit', ['0']) }}").replace("0", obj.id);
                            }
                        };

                        items.rename.label = "Rename";
                        items.create.label = "Create";
                        items.remove.label = "Delete";

                        items.show = {
                            label:"Show",
                            action: function(data) {
                                var inst = $.jstree.reference(data.reference),
                                    obj = inst.get_node(data.reference);

                                $.ajax("{{ url('admin/pages/tree/show') }}",
                                    {
                                        data: {id:obj.id},
                                        dataType:"json",
                                        success: function() {
                                            data.reference.css("opacity", "1");
                                        }
                                    }
                                );
                            }
                        };

                        items.hide = {
                            label:"Hide",
                            action: function(data) {
                                var inst = $.jstree.reference(data.reference),
                                    obj = inst.get_node(data.reference);

                                $.ajax("{{ url('admin/pages/tree/hide') }}",
                                    {
                                        data: {id:obj.id},
                                        dataType:"json",
                                        success: function() {
                                            data.reference.css("opacity", ".5");
                                        }
                                    }
                                );
                            }
                        };

                        return items;
                    },
                },
            });
    </script>
@endpush

