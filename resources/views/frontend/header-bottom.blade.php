<div class="container-fluid top-search-upload" style="position: relative">
                <div class="row search">
                    <style>
                        .search-box{
                            width: 100%;
                            position: relative;
                            display: inline-block;
                            font-size: 14px;
                        }
                        .result {
                            position: absolute;
                            z-index: 99;
                            top: 100%;
                            left: 135px;
                            background: #FFF;
                        }
                        .search-box input[type="text"], .result{
                            width: 100%;
                            box-sizing: border-box;
                        }
                        .result{
                            width: 45%;
                            box-sizing: border-box;
                        }
                        .result table {
                            width: 100%;
                        }
                        /* Formatting result items */
                        .result table tr{
                            margin: 0;
                            padding: 7px 10px;
                            border: 1px solid #CCCCCC;
                            border-top: none;
                            cursor: pointer;
                        }
                        .result table tr td:first-child{
                            width: 10%;
                            padding: 10px 0;
                        }
                        .result table tr td:nth-child(2){
                            width: 75%;
                        }
                        .result table tr td:nth-child(2):hover{
                            background: #f2f2f2;
                        }

                        @media  only screen and (min-width: 320px) and (max-width: 480px) {
                            .result {
                                position: absolute;
                                z-index: 99;
                                top: 46px;
                                left: 12px;
                                background: #FFF;
                            }
                            .result{
                                width: 75%;
                                box-sizing: border-box;
                            }
                            #productCategory{
                                margin-top: 11px;
                            }
                            .mobile-margin{
                                margin-top: 6px;
                            }
                            #search-body-mobile{
                                margin-left: -35px;
                            }
                            #upload-btn{
                                font-size: 11px;
                                padding-left: 4px;
                                padding-right: 4px;
                                margin-top: 21px;
                            }

                        }
                    </style>
                    <div style="background-color: #f0f0ed; width: 100%; padding: 5px 0;">
                        <div class="container">
                            <div class="col-sm-9  col-xs-9 text-center" id="search-body-mobile" style="border-right: 1px solid #777;">
                                <div class="col-sm-12">
                                    <div class="serchtile"></div>
                                    <form id="search-form" action="{{ url('/searching') }}" method="POST">
                                        @csrf
                                            <input type="text" name="search_product" id="search_text" placeholder="Search here..." class="form-control">
                                            {{-- <button type="submit" name="search_product" class="input-group-text" id="search_text"><i class="fa fa-search"></i>
                                            </button> --}}
                                    </form>
                                </div>
                                {{-- <div class="col-sm-3">
                                    <div class="serchtile"></div>
                                    <select id="productCategory" name="categoryId" class="form-control">
                                        <option value="1">Brand Name</option>
                                        <option value="2">Generic Name</option>
                                    </select>
                                </div>
                            </div>
 --}}                            {{-- <div class="col-sm-3 col-xs-3 text-center mobile-margin">
                                <a href="{{url('prescription-upload')}}">
                                    <button style="background-color: #006394" class="btn btn-primary btn-md" id="upload-btn">Upload Prescription</button>
                                </a>
                            </div>
                            <div class="clearfix"></div> --}}
                        </div>
                    </div>
                    <div id="search-results" class="result"></div>
                </div>
            </div> 