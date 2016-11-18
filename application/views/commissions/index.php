<div class="row">
  <div class="col-md-12">
    <h1 class="adm-title">Commissions</h1>
  </div>
</div>
<div class="row">
    <div class="col-md-4 col-md-offset-2">
        <?= form_open(null, ['id' => 'form_commission', 'class' => 'form-horizontal t20']); ?>
            <div class="row">
                <div class="col-md-6">
                    <h3>1. Choose a seller:</h3>
                    <input id="seller" class="form-control" type="text" name="seller">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h3>2. Choose an option:</h3>
                    <div class="radio">
                      <label>
                        <input type="radio" name="option" id="optionsRadios1" value="Last week">
                        Last week:
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="option" id="optionsRadios2" value="Bimonthly">
                        Bimonthly
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="option" id="optionsRadios3" value="Quarterly">
                        Quarterly
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="option" id="optionsRadios4" value="Biannual">
                        Biannual
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="option" id="optionsRadios5" value="Custom">
                        Custom
                      </label>
                    </div>
                    <div id="custom_dates" class="row t10 hideme">
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="date1" id="date1" placeholder="Start date">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="date2" id="date2" placeholder="End date">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <input type="submit" value="Calculate" class="btn btn-primary t20">
                </div>
            </div>
            <div class="errors"></div>
        <?= form_close() ?>
   </div>
   <div id="result" class="col-md-4 hideme">
       <div class="row">
           <div class="col-md-12 t20">
                <h2>Summary</h2>
                <table id="commission_table" class="table">
                    <tr>
                        <td class="results title">Seller:</td>
                        <td id="result-seller"></td>
                    </tr>
                    <tr>
                        <td class="results title">Option:</td>
                        <td id="result-option"></td>
                    </tr>
                    <tr>
                        <td class="results title">Sales Total:</td>
                        <td id="result-total"></td>
                    </tr>
                    <tr>
                        <td class="results title">Commission:</td>
                        <td id="result-commission"></td>
                    </tr>
                </table>
           </div>
       </div>
   </div>
</div>
