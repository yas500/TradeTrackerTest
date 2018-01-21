import {BrowserModule} from '@angular/platform-browser';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import {HttpClientModule} from '@angular/common/http';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import {NgModule} from '@angular/core';

import {AppRoutingModule} from './app-routing.module';
import {AppComponent} from './app.component';
import {ProductComponent} from './product/product.component';
import {BackendService} from './backend.service';

import {ButtonModule} from 'primeng/button';
import {GrowlModule, DataScrollerModule, DialogModule, DropdownModule} from 'primeng/primeng';

@NgModule({
    declarations: [
        AppComponent,
        ProductComponent
    ],
    imports: [
        BrowserModule,
        HttpClientModule,
        BrowserAnimationsModule,
        FormsModule,
        ReactiveFormsModule,
        DataScrollerModule,
        GrowlModule,
        DialogModule,
        DropdownModule,
        ButtonModule,
        AppRoutingModule
    ],
    providers: [BackendService],
    bootstrap: [AppComponent]
})
export class AppModule {}
