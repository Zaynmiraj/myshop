<div class="content">   
   <style>
       .content {
         padding-top: 40px;
         padding-bottom: 40px;
       }
       .icon-stat {
           display: block;
           overflow: hidden;
           position: relative;
           padding: 15px;
           margin-bottom: 1em;
           background-color: #fff;
           border-radius: 4px;
           border: 1px solid #ddd;
       }
       .icon-stat-label {
           display: block;
           color: #999;
           font-size: 13px;
       }
       .icon-stat-value {
           display: block;
           font-size: 28px;
           font-weight: 600;
       }
       .icon-stat-visual {
           position: relative;
           top: 22px;
           display: inline-block;
           width: 32px;
           height: 32px;
           border-radius: 4px;
           text-align: center;
           font-size: 16px;
           line-height: 30px;
       }
       .bg-primary {
           color: #fff;
           background: #d74b4b;
       }
       .bg-secondary {
           color: #fff;
           background: #6685a4;
       }
       
       .icon-stat-footer {
           padding: 10px 0 0;
           margin-top: 10px;
           color: #aaa;
           font-size: 12px;
           border-top: 1px solid #eee;
       }
   </style>
   <div class="container">
       <div class="row">
           <div class="col-md-3 col-sm-6">    
             <div class="icon-stat">    
               <div class="row">
                 <div class="col-xs-8 text-left">
                   <span class="icon-stat-label">Total Revenue</span>
                   <span class="icon-stat-value">{{$totalRevenue}}</span>
                 </div>   
                 <div class="col-xs-4 text-center">
                   <i class="fas fas-dollar icon-stat-visual bg-primary"></i>
                 </div>
               </div>    
               <div class="icon-stat-footer">
                 <i class="fa fa-clock-o"></i> Updated Now
               </div>    
             </div>    
           </div>    
           <div class="col-md-3 col-sm-6">    
             <div class="icon-stat">    
               <div class="row">
                 <div class="col-xs-8 text-left">
                   <span class="icon-stat-label">Total Sales</span>
                   <span class="icon-stat-value">{{$totalSale}}</span>
                 </div>    
                 <div class="col-xs-4 text-center">
                   <i class="fa fa-gift icon-stat-visual bg-secondary"></i>
                 </div>
               </div>    
               <div class="icon-stat-footer">
                 <i class="fa fa-clock-o"></i> Updated Now
               </div>   
             </div>
           </div>
           <div class="col-md-3 col-sm-6">    
             <div class="icon-stat">    
               <div class="row">
                 <div class="col-xs-8 text-left">
                   <span class="icon-stat-label">Today Revenue</span>
                   <span class="icon-stat-value">{{$todayRevenue}}</span>
                 </div>    
                 <div class="col-xs-4 text-center">
                   <i class="fa fa-dollar icon-stat-visual bg-primary"></i>
                 </div>
               </div>    
               <div class="icon-stat-footer">
                 <i class="fa fa-clock-o"></i> Updated Now
               </div>
             </div>    
           </div>    
           <div class="col-md-3 col-sm-6">    
             <div class="icon-stat">    
               <div class="row">
                 <div class="col-xs-8 text-left">
                   <span class="icon-stat-label">Today Sales</span>
                   <span class="icon-stat-value">{{$todaySale}}</span>
                 </div>    
                 <div class="col-xs-4 text-center">
                   <i class="fa fa-gift icon-stat-visual bg-secondary"></i>
                 </div>
               </div>    
               <div class="icon-stat-footer">
                 <i class="fa fa-clock-o"></i> Updated Now
               </div>    
             </div>    
           </div>    
         </div>        
   </div>   
   <div class="row">
      <style>
          .btn-primary {
              background-color: #148def;
              outline: none;
              border:none !important;
          } 
       </style>
      <div class="col-12 ">
          <div class="table-responsive">
              <div class="card">
                  <div class="card-header">
                      <h3> All Orders </h3>
                      @if(session()->has('success'))
                      <div class="alert alert-success alert-dismissible" role="alert"> {{session()->get('success') }}</div>
                      @endif
                  </div>
                  <div class="card-body">
                      <table class="table shopping-summery text-center clean">
                          <thead>
                              <tr class="main-heading">
                                  <td> Name </td>
                                  <td> Email </td>
                                  <td> Phone </td>
                                  <td> Status </td>
                                  <td> Total </td>
                                  <td> Date </td>
                                  <td> Action </td>
                                  <td colspan="2" class="text-center">Status Update </td>
                              </tr>
                          </thead>
                          @foreach($orders as $order)
                         @if($order->status == 'canceled')
                         <tbody class="bg-danger text-white">
                          <td> {{$order->first_name}} {{$order->last_name}}</td>
                          <td> {{$order->email}}</td>
                          <td> {{$order->phone}}</td>
                          <td> {{$order->status}}</td>
                          <td> {{$order->total}}</td>
                          <td> {{$order->created_at}}</td>
                          <td> <a href="{{route('admin.order.details',['order_id'=>$order->id])}}" class="btn btn-sm btn-primary"> Details </a>
                           </td>
                           <td> 
                              <div class="dropdown">
                                  <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown">Status <span class="caret"></span></button>
                                  <ul class="dropdown-menu" id="dropdown">
                                      <li><a href="" class="dropdown-item" wire:click.prevent="updateStatus({{$order->id}},'delivered')"> Delivered</a></li>
                                      <li><a href="" class="dropdown-item" wire:click.prevent="updateStatus({{$order->id}},'canceled')"> Canceled</a></li>
                                  </ul>
                              </div>
                           </td>
                       </tbody>
                         @elseif($order->status == 'delivered')
                         <tbody class="bg-primary text-white">
                          <td> {{$order->first_name}} {{$order->last_name}}</td>
                          <td> {{$order->email}}</td>
                          <td> {{$order->phone}}</td>
                          <td> {{$order->status}}</td>
                          <td> {{$order->total}}</td>
                          <td> {{$order->created_at}}</td>
                          <td> <a href="{{route('admin.order.details',['order_id'=>$order->id])}}" class="btn btn-sm btn-primary"> Details </a>
                           </td>
                           <td> 
                              <div class="dropdown">
                                  <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown">Status <span class="caret"></span></button>
                                  <ul class="dropdown-menu" id="dropdown">
                                      <li><a href="" class="dropdown-item" wire:click.prevent="updateStatus({{$order->id}},'delivered')"> Delivered</a></li>
                                      <li><a href="" class="dropdown-item" wire:click.prevent="updateStatus({{$order->id}},'canceled')"> Canceled</a></li>
                                  </ul>
                              </div>
                           </td>
                       </tbody>
                       @else
                       <tbody class="bg-info text-white">
                          <td> {{$order->first_name}} {{$order->last_name}}</td>
                          <td> {{$order->email}}</td>
                          <td> {{$order->phone}}</td>
                          <td> {{$order->status}}</td>
                          <td> {{$order->total}}</td>
                          <td> {{$order->created_at}}</td>
                          <td> <a href="{{route('admin.order.details',['order_id'=>$order->id])}}" class="btn btn-sm btn-primary"> Details </a>
                           </td>
                           <td> 
                              <div class="dropdown">
                                  <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown">Status <span class="caret"></span></button>
                                  <ul class="dropdown-menu" id="dropdown">
                                      <li><a href="" class="dropdown-item" wire:click.prevent="updateStatus({{$order->id}},'delivered')"> Delivered</a></li>
                                      <li><a href="" class="dropdown-item" wire:click.prevent="updateStatus({{$order->id}},'canceled')"> Canceled</a></li>
                                  </ul>
                              </div>
                           </td>
                       </tbody>
                       @endif
                           @endforeach
                      </table>
                  </div>
          </div>
      </div>
  </div> 
</div>