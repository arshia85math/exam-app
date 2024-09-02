@extends('layouts.main')

@section('style')
<style type="text/css" id="answerSheetStyle">
    .ot-answerSheet {}

    .ot-answerSheet .ot-as-tbl {
        width: 100%;
        padding: 0;
        margin: 0;
        direction: ltr;
    }

    .ot-answerSheet .ot-as-tbl td {
        vertical-align: top;
    }

    .ot-answerSheet .ot-as-tbl .tbltd {
        float: left;
    }

    .ot-answerSheet .ot-as-row {
        clear: both;
    }

    .ot-answerSheet label {
        cursor: pointer;
    }

    .ot-answerSheet .ot-as-row-dis {}

    .ot-answerSheet .ot-as-row label {
        float: left;
        width: 22px;
        text-align: center;
        font-size: 13px;
        padding-top: 3px;
        font-weight: 400;
    }

    .ot-answerSheet .ot-as-row .ot-as-option {
        color: #000;
        border: 1px solid #777;
        -moz-border-radius: .4em;
        -webkit-border-radius: .4em;
        border-radius: .4em;
        padding: 0px 7px;
        margin: 3px 1px;
        float: left;
        cursor: pointer;
        width: 25px;
        font-size: 10px;
        text-align: center;
    }

    @media (max-width: 992px) {
        .ot-answerSheet .ot-as-row .ot-as-option {
            padding: 5px 20px;
            margin: 3px 9px;
            font-size: 10px;
        }
    }

    @media(min-width:772px) and (max-width: 2000px) {
        .ot-answerSheet .ot-as-selecting .ot-as-row .ot-as-option:hover {
            border: 1px solid #000;
            background-color: #2ecc71;
        }

        .ot-answerSheet .ot-as-selecting .ot-as-row .ot-as-option-green:hover {
            border: 1px solid #000;
            background-color: #e74c3c;
        }
    }

    .ot-answerSheet .ot-as-row-dis .ot-as-option {
        background-color: #dedede;
        cursor: default;
    }

    .ot-answerSheet .ot-as-row .ot-as-option-easy {
        background-color: #94d2e3;
    }

    .ot-answerSheet .ot-as-row .ot-as-option-hard {
        background-color: silver;
    }

    .ot-answerSheet .ot-as-row .ot-as-option-green {
        background-color: #2ecc71;
    }

    .ot-answerSheet .ot-as-row .ot-as-option-green-key {
        color: #2ecc71;
        font-weight: bolder;
        background-color: #ecfff0;
    }

    .ot-answerSheet .ot-as-row .ot-as-option-red {
        background-color: #e74c3c;
    }

    .ot-answerSheet .ot-as-row .ot-as-option-dis {
        background-color: #f7f7f7;
        cursor: default;
        color: #d5d5d5;
    }

    .ot-answerSheet .sheet-clear {
        clear: both;
        border-top: 1px solid #eee;
    }
</style>
@endsection
@section('main')
<div id="answerSheet" class="ot-answerSheet">
    <div class="ot-as-tbl ot-as-selecting">
        <div>
            <div style="float: left;">
                <div class="ot-as-row ot-as-row-dis"><label data-qid="1">1</label>
                    <div class="ot-as-option" data-qid="1" data-option="1">1</div>
                    <div class="ot-as-option ot-as-option-green" data-qid="1" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="1" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="1" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="2">2</label>
                    <div class="ot-as-option" data-qid="2" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="2" data-option="2">2</div>
                    <div class="ot-as-option ot-as-option-green" data-qid="2" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="2" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="3">3</label>
                    <div class="ot-as-option" data-qid="3" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="3" data-option="2">2</div>
                    <div class="ot-as-option ot-as-option-green" data-qid="3" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="3" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="4">4</label>
                    <div class="ot-as-option" data-qid="4" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="4" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="4" data-option="3">3</div>
                    <div class="ot-as-option ot-as-option-green" data-qid="4" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="5">5</label>
                    <div class="ot-as-option ot-as-option-green" data-qid="5" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="5" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="5" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="5" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="6">6</label>
                    <div class="ot-as-option" data-qid="6" data-option="1">1</div>
                    <div class="ot-as-option ot-as-option-green" data-qid="6" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="6" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="6" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="7">7</label>
                    <div class="ot-as-option" data-qid="7" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="7" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="7" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="7" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="8">8</label>
                    <div class="ot-as-option" data-qid="8" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="8" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="8" data-option="3">3</div>
                    <div class="ot-as-option ot-as-option-green" data-qid="8" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="9">9</label>
                    <div class="ot-as-option ot-as-option-green" data-qid="9" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="9" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="9" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="9" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="10">10</label>
                    <div class="ot-as-option" data-qid="10" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="10" data-option="2">2</div>
                    <div class="ot-as-option ot-as-option-green" data-qid="10" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="10" data-option="4">4</div>
                    <div class="sheet-clear"></div>
                </div>
                <div class="ot-as-row"><label data-qid="11">11</label>
                    <div class="ot-as-option" data-qid="11" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="11" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="11" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="11" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="12">12</label>
                    <div class="ot-as-option" data-qid="12" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="12" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="12" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="12" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="13">13</label>
                    <div class="ot-as-option" data-qid="13" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="13" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="13" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="13" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="14">14</label>
                    <div class="ot-as-option" data-qid="14" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="14" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="14" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="14" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="15">15</label>
                    <div class="ot-as-option" data-qid="15" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="15" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="15" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="15" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="16">16</label>
                    <div class="ot-as-option" data-qid="16" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="16" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="16" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="16" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="17">17</label>
                    <div class="ot-as-option" data-qid="17" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="17" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="17" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="17" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="18">18</label>
                    <div class="ot-as-option" data-qid="18" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="18" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="18" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="18" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="19">19</label>
                    <div class="ot-as-option" data-qid="19" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="19" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="19" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="19" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="20">20</label>
                    <div class="ot-as-option" data-qid="20" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="20" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="20" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="20" data-option="4">4</div>
                    <div class="sheet-clear"></div>
                </div>
                <div class="ot-as-row"><label data-qid="21">21</label>
                    <div class="ot-as-option" data-qid="21" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="21" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="21" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="21" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="22">22</label>
                    <div class="ot-as-option" data-qid="22" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="22" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="22" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="22" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="23">23</label>
                    <div class="ot-as-option" data-qid="23" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="23" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="23" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="23" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="24">24</label>
                    <div class="ot-as-option" data-qid="24" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="24" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="24" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="24" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="25">25</label>
                    <div class="ot-as-option" data-qid="25" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="25" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="25" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="25" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="26">26</label>
                    <div class="ot-as-option" data-qid="26" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="26" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="26" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="26" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="27">27</label>
                    <div class="ot-as-option" data-qid="27" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="27" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="27" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="27" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="28">28</label>
                    <div class="ot-as-option" data-qid="28" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="28" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="28" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="28" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="29">29</label>
                    <div class="ot-as-option" data-qid="29" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="29" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="29" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="29" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="30">30</label>
                    <div class="ot-as-option" data-qid="30" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="30" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="30" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="30" data-option="4">4</div>
                    <div class="sheet-clear"></div>
                </div>
                <div class="ot-as-row"><label data-qid="31">31</label>
                    <div class="ot-as-option" data-qid="31" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="31" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="31" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="31" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="32">32</label>
                    <div class="ot-as-option" data-qid="32" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="32" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="32" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="32" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="33">33</label>
                    <div class="ot-as-option" data-qid="33" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="33" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="33" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="33" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="34">34</label>
                    <div class="ot-as-option" data-qid="34" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="34" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="34" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="34" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="35">35</label>
                    <div class="ot-as-option" data-qid="35" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="35" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="35" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="35" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="36">36</label>
                    <div class="ot-as-option" data-qid="36" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="36" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="36" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="36" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="37">37</label>
                    <div class="ot-as-option" data-qid="37" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="37" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="37" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="37" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="38">38</label>
                    <div class="ot-as-option" data-qid="38" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="38" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="38" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="38" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="39">39</label>
                    <div class="ot-as-option" data-qid="39" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="39" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="39" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="39" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="40">40</label>
                    <div class="ot-as-option" data-qid="40" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="40" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="40" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="40" data-option="4">4</div>
                    <div class="sheet-clear"></div>
                </div>
                <div class="ot-as-row"><label data-qid="41">41</label>
                    <div class="ot-as-option" data-qid="41" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="41" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="41" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="41" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="42">42</label>
                    <div class="ot-as-option" data-qid="42" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="42" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="42" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="42" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="43">43</label>
                    <div class="ot-as-option" data-qid="43" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="43" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="43" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="43" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="44">44</label>
                    <div class="ot-as-option" data-qid="44" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="44" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="44" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="44" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="45">45</label>
                    <div class="ot-as-option" data-qid="45" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="45" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="45" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="45" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="46">46</label>
                    <div class="ot-as-option" data-qid="46" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="46" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="46" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="46" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="47">47</label>
                    <div class="ot-as-option" data-qid="47" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="47" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="47" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="47" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="48">48</label>
                    <div class="ot-as-option" data-qid="48" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="48" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="48" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="48" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="49">49</label>
                    <div class="ot-as-option" data-qid="49" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="49" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="49" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="49" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="50">50</label>
                    <div class="ot-as-option" data-qid="50" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="50" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="50" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="50" data-option="4">4</div>
                    <div class="sheet-clear"></div>
                </div>
            </div>
            <div style="float: left;">
                <div class="ot-as-row ot-as-row-dis"><label data-qid="51">51</label>
                    <div class="ot-as-option" data-qid="51" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="51" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="51" data-option="3">3</div>
                    <div class="ot-as-option ot-as-option-green" data-qid="51" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="52">52</label>
                    <div class="ot-as-option" data-qid="52" data-option="1">1</div>
                    <div class="ot-as-option ot-as-option-green" data-qid="52" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="52" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="52" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="53">53</label>
                    <div class="ot-as-option" data-qid="53" data-option="1">1</div>
                    <div class="ot-as-option ot-as-option-green" data-qid="53" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="53" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="53" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="54">54</label>
                    <div class="ot-as-option" data-qid="54" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="54" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="54" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="54" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="55">55</label>
                    <div class="ot-as-option ot-as-option-green" data-qid="55" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="55" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="55" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="55" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="56">56</label>
                    <div class="ot-as-option" data-qid="56" data-option="1">1</div>
                    <div class="ot-as-option ot-as-option-green" data-qid="56" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="56" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="56" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="57">57</label>
                    <div class="ot-as-option" data-qid="57" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="57" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="57" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="57" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="58">58</label>
                    <div class="ot-as-option" data-qid="58" data-option="1">1</div>
                    <div class="ot-as-option ot-as-option-green" data-qid="58" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="58" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="58" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="59">59</label>
                    <div class="ot-as-option" data-qid="59" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="59" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="59" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="59" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="60">60</label>
                    <div class="ot-as-option" data-qid="60" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="60" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="60" data-option="3">3</div>
                    <div class="ot-as-option ot-as-option-green" data-qid="60" data-option="4">4</div>
                    <div class="sheet-clear"></div>
                </div>
                <div class="ot-as-row"><label data-qid="61">61</label>
                    <div class="ot-as-option" data-qid="61" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="61" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="61" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="61" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="62">62</label>
                    <div class="ot-as-option" data-qid="62" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="62" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="62" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="62" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="63">63</label>
                    <div class="ot-as-option" data-qid="63" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="63" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="63" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="63" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="64">64</label>
                    <div class="ot-as-option" data-qid="64" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="64" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="64" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="64" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="65">65</label>
                    <div class="ot-as-option" data-qid="65" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="65" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="65" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="65" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="66">66</label>
                    <div class="ot-as-option" data-qid="66" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="66" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="66" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="66" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="67">67</label>
                    <div class="ot-as-option" data-qid="67" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="67" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="67" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="67" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="68">68</label>
                    <div class="ot-as-option" data-qid="68" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="68" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="68" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="68" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="69">69</label>
                    <div class="ot-as-option" data-qid="69" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="69" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="69" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="69" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="70">70</label>
                    <div class="ot-as-option" data-qid="70" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="70" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="70" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="70" data-option="4">4</div>
                    <div class="sheet-clear"></div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="71">71</label>
                    <div class="ot-as-option" data-qid="71" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="71" data-option="2">2</div>
                    <div class="ot-as-option ot-as-option-green" data-qid="71" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="71" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="72">72</label>
                    <div class="ot-as-option" data-qid="72" data-option="1">1</div>
                    <div class="ot-as-option ot-as-option-green" data-qid="72" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="72" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="72" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="73">73</label>
                    <div class="ot-as-option" data-qid="73" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="73" data-option="2">2</div>
                    <div class="ot-as-option ot-as-option-green" data-qid="73" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="73" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="74">74</label>
                    <div class="ot-as-option" data-qid="74" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="74" data-option="2">2</div>
                    <div class="ot-as-option ot-as-option-green" data-qid="74" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="74" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="75">75</label>
                    <div class="ot-as-option" data-qid="75" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="75" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="75" data-option="3">3</div>
                    <div class="ot-as-option ot-as-option-green" data-qid="75" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="76">76</label>
                    <div class="ot-as-option" data-qid="76" data-option="1">1</div>
                    <div class="ot-as-option ot-as-option-red" data-qid="76" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="76" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="76" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="77">77</label>
                    <div class="ot-as-option" data-qid="77" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="77" data-option="2">2</div>
                    <div class="ot-as-option ot-as-option-red" data-qid="77" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="77" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="78">78</label>
                    <div class="ot-as-option" data-qid="78" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="78" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="78" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="78" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="79">79</label>
                    <div class="ot-as-option" data-qid="79" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="79" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="79" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="79" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="80">80</label>
                    <div class="ot-as-option" data-qid="80" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="80" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="80" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="80" data-option="4">4</div>
                    <div class="sheet-clear"></div>
                </div>
                <div class="ot-as-row"><label data-qid="81">81</label>
                    <div class="ot-as-option" data-qid="81" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="81" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="81" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="81" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="82">82</label>
                    <div class="ot-as-option" data-qid="82" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="82" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="82" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="82" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="83">83</label>
                    <div class="ot-as-option" data-qid="83" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="83" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="83" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="83" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="84">84</label>
                    <div class="ot-as-option" data-qid="84" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="84" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="84" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="84" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="85">85</label>
                    <div class="ot-as-option" data-qid="85" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="85" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="85" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="85" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="86">86</label>
                    <div class="ot-as-option" data-qid="86" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="86" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="86" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="86" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="87">87</label>
                    <div class="ot-as-option" data-qid="87" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="87" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="87" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="87" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="88">88</label>
                    <div class="ot-as-option" data-qid="88" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="88" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="88" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="88" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="89">89</label>
                    <div class="ot-as-option" data-qid="89" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="89" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="89" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="89" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="90">90</label>
                    <div class="ot-as-option" data-qid="90" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="90" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="90" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="90" data-option="4">4</div>
                    <div class="sheet-clear"></div>
                </div>
                <div class="ot-as-row"><label data-qid="91">91</label>
                    <div class="ot-as-option" data-qid="91" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="91" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="91" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="91" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="92">92</label>
                    <div class="ot-as-option" data-qid="92" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="92" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="92" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="92" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="93">93</label>
                    <div class="ot-as-option" data-qid="93" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="93" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="93" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="93" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="94">94</label>
                    <div class="ot-as-option" data-qid="94" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="94" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="94" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="94" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="95">95</label>
                    <div class="ot-as-option" data-qid="95" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="95" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="95" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="95" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="96">96</label>
                    <div class="ot-as-option" data-qid="96" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="96" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="96" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="96" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="97">97</label>
                    <div class="ot-as-option" data-qid="97" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="97" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="97" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="97" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="98">98</label>
                    <div class="ot-as-option" data-qid="98" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="98" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="98" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="98" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="99">99</label>
                    <div class="ot-as-option" data-qid="99" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="99" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="99" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="99" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="100">100</label>
                    <div class="ot-as-option" data-qid="100" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="100" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="100" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="100" data-option="4">4</div>
                    <div class="sheet-clear"></div>
                </div>
            </div>
            <div style="float: left;">
                <div class="ot-as-row"><label data-qid="101">101</label>
                    <div class="ot-as-option" data-qid="101" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="101" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="101" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="101" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="102">102</label>
                    <div class="ot-as-option" data-qid="102" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="102" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="102" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="102" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="103">103</label>
                    <div class="ot-as-option" data-qid="103" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="103" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="103" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="103" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="104">104</label>
                    <div class="ot-as-option" data-qid="104" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="104" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="104" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="104" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="105">105</label>
                    <div class="ot-as-option" data-qid="105" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="105" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="105" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="105" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="106">106</label>
                    <div class="ot-as-option" data-qid="106" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="106" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="106" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="106" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="107">107</label>
                    <div class="ot-as-option" data-qid="107" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="107" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="107" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="107" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="108">108</label>
                    <div class="ot-as-option" data-qid="108" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="108" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="108" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="108" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="109">109</label>
                    <div class="ot-as-option" data-qid="109" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="109" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="109" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="109" data-option="4">4</div>
                </div>
                <div class="ot-as-row"><label data-qid="110">110</label>
                    <div class="ot-as-option" data-qid="110" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="110" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="110" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="110" data-option="4">4</div>
                    <div class="sheet-clear"></div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="111">111</label>
                    <div class="ot-as-option" data-qid="111" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="111" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="111" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="111" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="112">112</label>
                    <div class="ot-as-option" data-qid="112" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="112" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="112" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="112" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="113">113</label>
                    <div class="ot-as-option" data-qid="113" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="113" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="113" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="113" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="114">114</label>
                    <div class="ot-as-option" data-qid="114" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="114" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="114" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="114" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="115">115</label>
                    <div class="ot-as-option" data-qid="115" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="115" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="115" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="115" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="116">116</label>
                    <div class="ot-as-option" data-qid="116" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="116" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="116" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="116" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="117">117</label>
                    <div class="ot-as-option" data-qid="117" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="117" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="117" data-option="3">3</div>
                    <div class="ot-as-option ot-as-option-green" data-qid="117" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="118">118</label>
                    <div class="ot-as-option" data-qid="118" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="118" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="118" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="118" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="119">119</label>
                    <div class="ot-as-option" data-qid="119" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="119" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="119" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="119" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="120">120</label>
                    <div class="ot-as-option" data-qid="120" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="120" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="120" data-option="3">3</div>
                    <div class="ot-as-option ot-as-option-green" data-qid="120" data-option="4">4</div>
                    <div class="sheet-clear"></div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="121">121</label>
                    <div class="ot-as-option" data-qid="121" data-option="1">1</div>
                    <div class="ot-as-option ot-as-option-green" data-qid="121" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="121" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="121" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="122">122</label>
                    <div class="ot-as-option ot-as-option-green" data-qid="122" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="122" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="122" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="122" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="123">123</label>
                    <div class="ot-as-option" data-qid="123" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="123" data-option="2">2</div>
                    <div class="ot-as-option ot-as-option-green" data-qid="123" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="123" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="124">124</label>
                    <div class="ot-as-option" data-qid="124" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="124" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="124" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="124" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="125">125</label>
                    <div class="ot-as-option" data-qid="125" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="125" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="125" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="125" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="126">126</label>
                    <div class="ot-as-option" data-qid="126" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="126" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="126" data-option="3">3</div>
                    <div class="ot-as-option ot-as-option-green" data-qid="126" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="127">127</label>
                    <div class="ot-as-option" data-qid="127" data-option="1">1</div>
                    <div class="ot-as-option ot-as-option-green" data-qid="127" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="127" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="127" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="128">128</label>
                    <div class="ot-as-option ot-as-option-green" data-qid="128" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="128" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="128" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="128" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="129">129</label>
                    <div class="ot-as-option" data-qid="129" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="129" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="129" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="129" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="130">130</label>
                    <div class="ot-as-option" data-qid="130" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="130" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="130" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="130" data-option="4">4</div>
                    <div class="sheet-clear"></div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="131">131</label>
                    <div class="ot-as-option ot-as-option-green" data-qid="131" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="131" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="131" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="131" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="132">132</label>
                    <div class="ot-as-option" data-qid="132" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="132" data-option="2">2</div>
                    <div class="ot-as-option ot-as-option-green" data-qid="132" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="132" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="133">133</label>
                    <div class="ot-as-option" data-qid="133" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="133" data-option="2">2</div>
                    <div class="ot-as-option ot-as-option-green" data-qid="133" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="133" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="134">134</label>
                    <div class="ot-as-option" data-qid="134" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="134" data-option="2">2</div>
                    <div class="ot-as-option ot-as-option-green" data-qid="134" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="134" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="135">135</label>
                    <div class="ot-as-option" data-qid="135" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="135" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="135" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="135" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="136">136</label>
                    <div class="ot-as-option" data-qid="136" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="136" data-option="2">2</div>
                    <div class="ot-as-option ot-as-option-green" data-qid="136" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="136" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="137">137</label>
                    <div class="ot-as-option ot-as-option-green" data-qid="137" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="137" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="137" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="137" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="138">138</label>
                    <div class="ot-as-option" data-qid="138" data-option="1">1</div>
                    <div class="ot-as-option ot-as-option-green" data-qid="138" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="138" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="138" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="139">139</label>
                    <div class="ot-as-option ot-as-option-red" data-qid="139" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="139" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="139" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="139" data-option="4">4</div>
                </div>
                <div class="ot-as-row ot-as-row-dis"><label data-qid="140">140</label>
                    <div class="ot-as-option ot-as-option-red" data-qid="140" data-option="1">1</div>
                    <div class="ot-as-option" data-qid="140" data-option="2">2</div>
                    <div class="ot-as-option" data-qid="140" data-option="3">3</div>
                    <div class="ot-as-option" data-qid="140" data-option="4">4</div>
                    <div class="sheet-clear"></div>
                </div>
            </div>
            <div style="float: left;"></div>
            <div style="float: left;"></div>
            <div style="float: left;"></div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

@endsection