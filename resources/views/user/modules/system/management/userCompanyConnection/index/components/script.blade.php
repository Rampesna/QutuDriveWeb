<script src="{{ asset('assets/jqwidgets/jqxcore.js') }}"></script>
<script src="{{ asset('assets/jqwidgets/jqxbuttons.js') }}"></script>
<script src="{{ asset('assets/jqwidgets/jqxscrollbar.js') }}"></script>
<script src="{{ asset('assets/jqwidgets/jqxlistbox.js') }}"></script>
<script src="{{ asset('assets/jqwidgets/jqxdropdownlist.js') }}"></script>
<script src="{{ asset('assets/jqwidgets/jqxmenu.js') }}"></script>
<script src="{{ asset('assets/jqwidgets/jqxgrid.js') }}"></script>
<script src="{{ asset('assets/jqwidgets/jqxgrid.selection.js') }}"></script>
<script src="{{ asset('assets/jqwidgets/jqxgrid.columnsreorder.js') }}"></script>
<script src="{{ asset('assets/jqwidgets/jqxgrid.columnsresize.js') }}"></script>
<script src="{{ asset('assets/jqwidgets/jqxgrid.filter.js') }}"></script>
<script src="{{ asset('assets/jqwidgets/jqxgrid.sort.js') }}"></script>
<script src="{{ asset('assets/jqwidgets/jqxdata.js') }}"></script>
<script src="{{ asset('assets/jqwidgets/jqxgrid.pager.js') }}"></script>
<script src="{{ asset('assets/jqwidgets/jqxnumberinput.js') }}"></script>
<script src="{{ asset('assets/jqwidgets/jqxwindow.js') }}"></script>
<script src="{{ asset('assets/jqwidgets/jqxdata.export.js') }}"></script>
<script src="{{ asset('assets/jqwidgets/jqxgrid.export.js') }}"></script>
<script src="{{ asset('assets/jqwidgets/jqxexport.js') }}"></script>
<script src="{{ asset('assets/jqwidgets/jqxgrid.grouping.js') }}"></script>
<script src="{{ asset('assets/jqwidgets/globalization/globalize.js') }}"></script>
<script src="{{ asset('assets/jqwidgets/jqgrid-localization.js') }}"></script>
<script src="{{ asset('assets/jqwidgets/jszip.min.js') }}"></script>

<script>

    $(document).ready(function () {
        $('#loader').hide();
    });

    var usersDiv = $('#users');
    var companiesDiv = $('#companies');

    function getAllUsers() {
        $.ajax({
            type: 'get',
            url: '{{ route('user.api.user.getAll') }}',
            headers: {
                'Accept': 'application/json',
                'Authorization': authUserToken
            },
            data: {},
            success: function (response) {
                var source = {
                    localdata: response.response.map(function (user) {
                        return {
                            ID: user.ID,
                            KULLANICIADI: user.KULLANICIADI,
                            APIKEY: user.APIKEY,
                            AD: user.AD,
                            SOYAD: user.SOYAD,
                            TELEFON: user.TELEFON,
                            MAIL: user.MAIL,
                            TCNO: user.TCNO,
                            KULLANICITIPI: parseInt(user.KULLANICITIPI) === 1 ? '<span class="badge badge-light-primary">KULLANICI</span>' : '<span class="badge badge-light-info">ADMİN</span>',
                            KAYITTARIHI: user.KAYITTARIHI ? reformatDatetimeToDatetimeForHuman(user.KAYITTARIHI) : '',
                            DURUM: parseInt(user.DURUM) === 1 ? `<span class="badge badge-light-success">AKTİF</span>` : `<span class="badge badge-light-warning">PASİF</span>`,
                        }
                    }),
                    datatype: "array",
                    datafields: [
                        {name: 'ID', type: 'integer'},
                        {name: 'KULLANICIADI', type: 'string'},
                        {name: 'APIKEY', type: 'string'},
                        {name: 'AD', type: 'string'},
                        {name: 'SOYAD', type: 'string'},
                        {name: 'TELEFON', type: 'string'},
                        {name: 'MAIL', type: 'string'},
                        {name: 'TCNO', type: 'string'},
                        {name: 'KULLANICITIPI', type: 'string'},
                        {name: 'KAYITTARIHI', type: 'string'},
                        {name: 'DURUM', type: 'string'},
                    ]
                };
                var dataAdapter = new $.jqx.dataAdapter(source);
                usersDiv.on('contextmenu', function (e) {
                    var top = e.pageY - 10;
                    var left = e.pageX - 10;
                    $("#contextMenu").css({
                        display: "block",
                        top: top,
                        left: left
                    });
                    return false;
                });
                usersDiv.on('rowclick', function (event) {
                    if (event.args.rightclick) {
                        usersDiv.jqxGrid('selectrow', event.args.rowindex);
                        var rowindex = usersDiv.jqxGrid('getselectedrowindex');
                        $('#selected_user_row_index').val(rowindex);
                        var dataRecord = usersDiv.jqxGrid('getrowdata', rowindex);
                        $('#selected_user_id').val(dataRecord.ID);
                        return false;
                    } else {
                        $("#contextMenu").hide();
                    }

                    return false;
                });
                usersDiv.jqxGrid({
                    width: '100%',
                    height: '600',
                    source: dataAdapter,
                    columnsresize: true,
                    groupable: true,
                    theme: jqxGridGlobalTheme,
                    filterable: true,
                    showfilterrow: true,
                    pageable: false,
                    sortable: true,
                    pagesizeoptions: ['10', '20', '50', '1000'],
                    localization: getLocalization('tr'),
                    columns: [
                        {
                            text: '#',
                            dataField: 'ID',
                            columntype: 'textbox',
                            width: '10%',
                        },
                        {
                            text: 'Kullanıcı Adı',
                            dataField: 'KULLANICIADI',
                            columntype: 'textbox',
                            width: '15%',
                        },
                        {
                            text: 'API Key',
                            dataField: 'APIKEY',
                            columntype: 'textbox',
                            width: '18%',
                        },
                        {
                            text: 'Ad',
                            dataField: 'AD',
                            columntype: 'textbox',
                            width: '15%',
                        },
                        {
                            text: 'Soyad',
                            dataField: 'SOYAD',
                            columntype: 'textbox',
                            width: '15%',
                        },
                        {
                            text: 'Telefon',
                            dataField: 'TELEFON',
                            columntype: 'textbox',
                            width: '10%',
                        },
                        {
                            text: 'E-posta',
                            dataField: 'MAIL',
                            columntype: 'textbox',
                            width: '15%',
                        },
                        {
                            text: 'TC No',
                            dataField: 'TCNO',
                            columntype: 'textbox',
                            width: '8%',
                        },
                        {
                            text: 'Kullanıcı Tipi',
                            dataField: 'KULLANICITIPI',
                            columntype: 'textbox',
                            width: '8%',
                        },
                        {
                            text: 'Kayıt Tarihi',
                            dataField: 'KAYITTARIHI',
                            columntype: 'textbox',
                            width: '10%',
                        },
                        {
                            text: 'Durum',
                            dataField: 'DURUM',
                            columntype: 'textbox',
                            width: '8%',
                        }
                    ],
                });
                usersDiv.jqxGrid('sortby', 'id', 'desc');
            },
            error: function (error) {
                console.log(error);
                if (parseInt(error.status) === 422) {
                    $.each(error.responseJSON.response, function (i, error) {
                        toastr.error(error[0]);
                    });
                } else {
                    toastr.error(error.responseJSON.message);
                }
            }
        });
    }

    function getAllCompanies() {
        $.ajax({
            type: 'get',
            url: '{{ route('user.api.company.getAll') }}',
            headers: {
                'Accept': 'application/json',
                'Authorization': authUserToken
            },
            data: {},
            success: function (response) {
                var source = {
                    localdata: response.response.map(function (company) {
                        return {
                            ID: company.ID,
                            FIRMAUNVAN: company.FIRMAUNVAN,
                            APIKEY: company.APIKEY,
                            AD: company.AD,
                            SOYAD: company.SOYAD,
                            TELEFON: company.TELEFON,
                            MAIL: company.MAIL,
                            VKNTCKN: company.VKNTCKN,
                            EDEFTERKAYNAKTURU: `<span class="badge badge-light-primary">${company.EDEFTERKAYNAKTURU ? parseInt(company.EDEFTERKAYNAKTURU) === 1 ? `KLASÖR` : (parseInt(company.EDEFTERKAYNAKTURU) === 2 ? `PORTAL` : parseInt(company.EDEFTERKAYNAKTURU)) : ``}</span>`,
                            KAYITTARIHI: company.KAYITTARIHI ? reformatDatetimeToDatetimeForHuman(company.KAYITTARIHI) : '',
                            DURUM: parseInt(company.DURUM) === 1 ? `<span class="badge badge-light-success">AKTİF</span>` : `<span class="badge badge-light-warning">PASİF</span>`,
                        }
                    }),
                    datatype: "array",
                    datafields: [
                        {name: 'ID', type: 'integer'},
                        {name: 'FIRMAUNVAN', type: 'string'},
                        {name: 'APIKEY', type: 'string'},
                        {name: 'AD', type: 'string'},
                        {name: 'SOYAD', type: 'string'},
                        {name: 'TELEFON', type: 'string'},
                        {name: 'MAIL', type: 'string'},
                        {name: 'VKNTCKN', type: 'string'},
                        {name: 'EDEFTERKAYNAKTURU', type: 'string'},
                        {name: 'KAYITTARIHI', type: 'string'},
                        {name: 'DURUM', type: 'string'},
                    ]
                };
                var dataAdapter = new $.jqx.dataAdapter(source);
                companiesDiv.on('contextmenu', function (e) {
                    var top = e.pageY - 10;
                    var left = e.pageX - 10;
                    $("#contextMenu").css({
                        display: "block",
                        top: top,
                        left: left
                    });
                    return false;
                });
                companiesDiv.on('rowclick', function (event) {
                    if (event.args.rightclick) {
                        companiesDiv.jqxGrid('selectrow', event.args.rowindex);
                        var rowindex = companiesDiv.jqxGrid('getselectedrowindex');
                        $('#selected_company_row_index').val(rowindex);
                        var dataRecord = companiesDiv.jqxGrid('getrowdata', rowindex);
                        $('#selected_company_id').val(dataRecord.ID);
                        return false;
                    } else {
                        $("#contextMenu").hide();
                    }

                    return false;
                });
                companiesDiv.jqxGrid({
                    width: '100%',
                    height: '600',
                    source: dataAdapter,
                    columnsresize: true,
                    groupable: true,
                    theme: jqxGridGlobalTheme,
                    filterable: true,
                    showfilterrow: true,
                    pageable: false,
                    sortable: true,
                    pagesizeoptions: ['10', '20', '50', '1000'],
                    localization: getLocalization('tr'),
                    columns: [
                        {
                            text: '#',
                            dataField: 'ID',
                            columntype: 'textbox',
                            width: '10%',
                        },
                        {
                            text: 'Firma Ünvan',
                            dataField: 'FIRMAUNVAN',
                            columntype: 'textbox',
                            width: '15%',
                        },
                        {
                            text: 'API Key',
                            dataField: 'APIKEY',
                            columntype: 'textbox',
                            width: '18%',
                        },
                        {
                            text: 'Ad',
                            dataField: 'AD',
                            columntype: 'textbox',
                            width: '15%',
                        },
                        {
                            text: 'Soyad',
                            dataField: 'SOYAD',
                            columntype: 'textbox',
                            width: '15%',
                        },
                        {
                            text: 'Telefon',
                            dataField: 'TELEFON',
                            columntype: 'textbox',
                            width: '10%',
                        },
                        {
                            text: 'E-posta',
                            dataField: 'MAIL',
                            columntype: 'textbox',
                            width: '15%',
                        },
                        {
                            text: 'Vergi No',
                            dataField: 'VKNTCKN',
                            columntype: 'textbox',
                            width: '8%',
                        },
                        {
                            text: 'e-Defter Kaynağı',
                            dataField: 'EDEFTERKAYNAKTURU',
                            columntype: 'textbox',
                            width: '8%',
                        },
                        {
                            text: 'Kayıt Tarihi',
                            dataField: 'KAYITTARIHI',
                            columntype: 'textbox',
                            width: '10%',
                        },
                        {
                            text: 'Durum',
                            dataField: 'DURUM',
                            columntype: 'textbox',
                            width: '8%',
                        }
                    ],
                });
                companiesDiv.jqxGrid('sortby', 'id', 'desc');
            },
            error: function (error) {
                console.log(error);
                if (parseInt(error.status) === 422) {
                    $.each(error.responseJSON.response, function (i, error) {
                        toastr.error(error[0]);
                    });
                } else {
                    toastr.error(error.responseJSON.message);
                }
            }
        });
    }

    getAllUsers();
    getAllCompanies();

</script>
