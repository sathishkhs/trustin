
$(document).ready(function() {
    /*Dropdown multi select code begins here*/
    var method = "";
    method = $("#method").val(); //if you are in
    if (method) {
        var x = new SlimSelect({
            select: '.multiselect1',
            limit: 3,
            allowDeselect: true, hideSelectedOption: true,
        });
    }
    /*Dropdown multi select code end here*/
    $("#access_type_id").change((function() {
        if ($(this).val() == 1) {
            $(".approvers").hide();
        } else {
            $(".approvers").show();
        }
    }));


    $('#bootstrap-data-table-export').DataTable();
    $('.left-menus li :checkbox').on('click', function() {
        var $chk = $(this),
                $li = $chk.closest('li'),
                $ul, $parent;
        if ($li.has('ul')) {
            $li.find(':checkbox').not(this).prop('checked', this.checked)
        }
        do {
            $ul = $li.parent();
            $parent = $ul.siblings(':checkbox');
            if ($chk.is('.childs')) {
                $parent.prop('checked', true)
            } else {
                $parent.prop('checked', false)
            }
            $chk = $parent;
            $li = $chk.closest('.parents');
        } while ($ul.is(':not(.someclass)'));
    });

    $(".selectall").click(function() {
        //$(this.form.elements).filter(':checkbox').prop('checked', this.checked);
        var option = $("input[name=multiple]:checked").val();
        //alert(option);
        if (option == 'add') {
            if (this.checked) {
                $('.add_permission').each(function() {
                    this.checked = true;
                });
                $('.edit_permission,.delete_permission,.view_permission').each(function() {
                    this.checked = false;
                });
            }
            else {
                $('.add_permission').each(function() {
                    this.checked = false;
                });
            }
        } else if (option == 'edit') {
            if (this.checked) {
                $('.edit_permission').each(function() {
                    this.checked = true;
                });
                $('.add_permission,.delete_permission,.view_permission').each(function() {
                    this.checked = false;
                });
            }
            else {
                $('.edit_permission').each(function() {
                    this.checked = false;
                });
            }
        } else if (option == 'delete') {
            if (this.checked) {
                $('.delete_permission').each(function() {
                    this.checked = true;
                });
                $('.add_permission,.edit_permission,.view_permission').each(function() {
                    this.checked = false;
                });
            }
            else {
                $('.delete_permission').each(function() {
                    this.checked = false;
                });
            }
        } else if (option == 'view') {
            if (this.checked) {
                $('.view_permission').each(function() {
                    this.checked = true;
                });
                $('.add_permission,.edit_permission,.delete_permission').each(function() {
                    this.checked = false;
                });
            }
            else {
                $('.view_permission').each(function() {
                    this.checked = false;
                });
            }
        } else if (option == 'all') {
            if (this.checked) {
                $('.allcheckbox').each(function() {
                    this.checked = true;
                });
            }
            else {
                $('.allcheckbox').each(function() {
                    this.checked = false;
                });
            }
        } else if (option == 'adde_dit') {
            if (this.checked) {
                $('.add_permission,.edit_permission').each(function() {
                    this.checked = true;
                });
                $('.delete_permission').each(function() {
                    this.checked = false;
                });
            }
            else {
                $('.add_permission,.edit_permission').each(function() {
                    this.checked = true;
                });
                $('.delete_permission').each(function() {
                    this.checked = false;
                });
            }
        } else if (option == 'noall') {
            $('.allcheckbox').each(function() {
                this.checked = false;
            });
        }
    });

    $(".selectallpages").click(function() {
        var option = $("input[name=pagesmultiple]:checked").val();
        if (option == 'all') {
            if (this.checked) {
                $('.pagescheckbox').each(function() {
                    this.checked = true;
                });
            }
            else {
                $('.pagescheckbox').each(function() {
                    this.checked = false;
                });
            }
        } else if (option == 'noall') {
            $('.pagescheckbox').each(function() {
                this.checked = false;
            });
        }
    });

})