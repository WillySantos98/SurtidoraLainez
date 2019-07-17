
    <div class="row">
        <div class="col">
            <p><img src="../../../../../../iconos/bateria.svg" style="width: 30px; height: 30px" alt=""> Bateria</p>
        </div>
        <div class="col">
            <p><img src="../../../../../../iconos/casco.svg" style="width: 30px; height: 30px" alt=""> Casco</p>
        </div>
        <div class="col">
            <p><img src="../../../../../../iconos/llave.svg" style="width: 30px; height: 30px" alt=""> Llaves</p>
        </div>
        <div class="col">
            <p><img src="../../../../../../iconos/acido.svg" style="width: 30px; height: 30px" alt=""> Acido de Bateria</p>
        </div>
        <div class="col">
            <p><img src="../../../../../../iconos/garantia.svg" style="width: 30px; height: 30px" alt=""> Hoja de Garantia</p>
        </div>
    </div>
   <div style="overflow-y: scroll; height: 250px;">
       <table class="table table-hover">
           <thead>
           <tr>
               <th class="text-center">Codigo</th>
               <th class="text-center">Marca</th>
               <th class="text-center">Modelo</th>
               <th class="text-center">Color</th>
               <th class="text-center"># de Chasis</th>
               <th class="text-center"><img src="../../../../../../iconos/casco.svg" style="width: 30px; height: 30px" alt=""></th>
               <th class="text-center"><img src="../../../../../../iconos/bateria.svg" style="width: 30px; height: 30px" alt=""></th>
               <th class="text-center"><img src="../../../../../../iconos/acido.svg" style="width: 30px; height: 30px" alt=""></th>
               <th class="text-center"><img src="../../../../../../iconos/llave.svg" style="width: 30px; height: 30px" alt=""> </th>
               <th class="text-center"><img src="../../../../../../iconos/garantia.svg" style="width: 30px; height: 30px" alt=""></th>
               <th class="text-center">Subir Doc</th>
           </tr>
           </thead>
           <tbody>
           @foreach($motos as $item)
               <tr>
                   <input type="text" class="form-group" value="{{$item->id}}" hidden name="MotodId[]">
                   <td class="text-center">{{$item->id_moto}}</td>
                   <td class="text-center">{{$item->nombre_mar}}</td>
                   <td class="text-center">{{$item->nombre_mod}}</td>
                   <td class="text-center">{{$item->color}}</td>
                   <td class="text-center">{{$item->chasis}}</td>
                   <td class="text-center">
                       <select name="SelectCasco[]" class="form-control" required id="">
                           <option value="2">----</option>
                           <option value="1">Si</option>
                           <option value="2">No</option>
                       </select>
                   </td>
                   <td class="text-center">
                       <select name="SelectBateria[]" class="form-control" required id="">
                           <option value="2">----</option>
                           <option value="1">Si</option>
                           <option value="2">No</option>
                       </select>
                   </td>
                   <td class="text-center">
                       <select name="SelectAcido[]" class="form-control" required id="">
                           <option value="2">----</option>
                           <option value="1">Si</option>
                           <option value="2">No</option>
                       </select>
                   </td>
                   <td class="text-center">
                       <select name="SelectLlaves[]" class="form-control" required id="">
                           <option value="4">----</option>
                           <option value="4">No</option>
                           <option value="1">1</option>
                           <option value="2">2</option>
                           <option value="3">3</option>
                       </select>
                   </td>
                   <td class="text-center">
                       <select name="SelectGarantia[]" class="form-control" required id="">
                           <option value="2">----</option>
                           <option value="1">Si</option>
                           <option value="2">No</option>
                       </select>
                   </td>
                   <td><input type="file" required multiple class="form-control" name="InputDocumentosMoto-{{$item->id}}[]"></td>
               </tr>
           @endforeach
           </tbody>
       </table>
   </div>

