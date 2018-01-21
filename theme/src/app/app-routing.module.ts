import {NgModule} from '@angular/core';
import {CommonModule} from '@angular/common';
import {RouterModule, Routes} from '@angular/router';

import {ProductComponent} from './product/product.component';

const routes: Routes = [{
    path: "index",
    redirectTo: "/"
},{
    path: "results",
    component: ProductComponent
}];

@NgModule({
    exports: [
        RouterModule
    ],
    imports: [
        CommonModule,
        RouterModule.forRoot(routes)
    ],
    declarations: []
})
export class AppRoutingModule {}
