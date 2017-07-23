@extends('layouts.master')
@section('Title')
   Default Template
@endsection

@section('content')
  <div class="jumbotronCus">
        <div class="container containerCus">
            <div class="panel panel-default">
                <div class="panel-body">
                        <div class=jumbotronCus>
                            <div class="containerCus">
                                <div class="templatediv " style="float:left;clear:both">
                                    <div class="form-group">
                                        <h3 id="heading"  >Kindly fill the following form so that we can add create a Sales page for you according to your need </h3>
                                    </div>
                                    <div style="position: relative;" class="form-group">
                                        <input id="previewBtn" type="submit" class="btn btn-primary" value= "Preview Template" >
                                    </div>
                                    <div style="position: relative;" class="form-group">
                                        <input id="saveTemplateBtn" type="submit" class="btn btn-primary" value= "Save Template" disabled="true">
                                    </div>
                                    <form  action=""  >
                                        <div title="You can re arrange your sections by grabbing and dropping them. Try It!"  style="position: relative;" class=" ui-state-default form-group">

                                            <label  for="usr">Header</label>
                                            <input id="headertxt" type="text" title="Add Your Page Title here. You can skip it too if you want" class="form-control inputmargin" placeholder="Add your Header Text here" value="" >
                                            <br>
                                            <textarea id="headerDescInput"  class="form-control inputmargin" placeholder="Write a short desciption about your header" rows="2"></textarea>
                                            <br>
                                        </div>

                                        <ul id="psP">
                                            <li id="1" class="" >
                                                <div title="You can re arrange your sections by grabbing and dropping them. Try It!" id="sectiondiv" style="position: relative;" class="sortable ui-state-default">
                                                    <label  for="usr">Section One</label>&nbsp
                                                    <input id="sectTitle1" title="This is your Section's Title. You can skip this and just write your description below and we will take care of the rest." type="text" class="form-control inputmargin" placeholder="Give Your Section a heading here."  value="">
                                                    <br>
                                                    <textarea id="sectDesc1"  class="form-control inputmargin" placeholder="Write the text regarding your section here" rows="4"></textarea>
                                                    <br>
                                                </div>
                                            </li>


                                            <li title="You can re arrange your sections by grabbing and dropping them. Try It!" id="2" class="" style="list-style-type: none;">
                                                <div id="sectiondiv2" style="position: relative;" class="ui-state-default">
                                                    <label  for="usr">Section Two</label>&nbsp
                                                    <input id="sectTitle2" title="This is your Section's Title. You can skip this and just write your description below and we will take care of the rest." type="text" class="form-control inputmargin" placeholder="Give Your Section a heading here."  value="">
                                                    <br>
                                                    <textarea id="sectDesc2"  class="form-control inputmargin" placeholder="Write the text regarding your section here" rows="4"></textarea>
                                                    <br>
                                                </div>
                                            </li>
                                            <li title="You can re arrange your sections by grabbing and dropping them. Try It!" id="3" class=""style="list-style-type: none;">
                                                <div id="sectiondiv3" style="position: relative;" class="ui-state-default">
                                                    <label  for="usr">Section Three</label>&nbsp
                                                    <input id="sectTitle3" title="This is your Section's Title. You can skip this and just write your description below and we will take care of the rest." type="text" class="form-control inputmargin" placeholder="Give Your Section a heading here."  value="">
                                                    <br>
                                                    <textarea id="sectDesc3"  class="form-control inputmargin" placeholder="Write the text regarding your section here" rows="4"></textarea>
                                                    <br>
                                                </div>
                                            </li>

                                            <li title="You can re arrange your sections by grabbing and dropping them. Try It!" id="link" class="ui-state-default" style="list-style-type: none;">
                                                <div id="linkdiv" style="position: relative;" class=" form-group">
                                                    <label for="usr" style="float:left;">Youtube iframe</label>&nbsp
                                                    <input id="YoutubeLink" title="Copy the Youtube embed link of your desired video and paste it here." type="text" class="form-control inputmargin" placeholder="Copy the iframe of your video and paste it here"
                                                    value=''>
                                                    <br>
                                                </div>
                                            </li>
                                        </ul>
                                        <div id="buydiv" style="position: relative;" class=" form-group ui-state-default  ">
                                            <label for="usr" style="float:left;">Buy Button Code</label>&nbsp
                                            <br>
                                            <textarea id="paypalCode"  class="form-control inputmargin" placeholder="Paste your PayPal button you created through your paypal account" rows="4"></textarea>
                                            <br>
                                        </div>
                                    </form>

                                <div id="dialog" >
                                    <div id="headerDiv">   
                                        <div class="form-group">
                                            <h2 id="heading"  class="text-center page-title" style='background-color:rgb(122, 201, 237);color:white;text-align:center;line-height:55px;'>-</h2>
                                        </div>
                                        <div class="form-group">
                                            <p id="headerDesc" class="text-center page-title" Style='text-align:center; text-align: justify; padding:0 21.5% 0 21.5%; width:100%; overflow-wrap: break-word;word-wrap: break-word; hyphens: auto;'>-</p>
                                        </div>
                                    </div>  
                                    <div id="buybutton" class="form-group target" >
                                        <p id="buybtn" class="text-center" Style='text-align:center;line-height:55px;'></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
      </div>
  </div>
  <div class="modal"><!-- Place at bottom of page --></div>
@endsection


