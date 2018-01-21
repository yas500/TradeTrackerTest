import {Component, OnInit} from '@angular/core';
import {Router, ActivatedRoute} from '@angular/router';

import {MessageService} from 'primeng/components/common/messageservice';
import {BackendService} from '../backend.service';

const url = "/api/xml";

@Component({
    selector: 'app-product',
    templateUrl: './product.component.html',
    styleUrls: ['./product.component.css']
})
export class ProductComponent implements OnInit {

    finished: boolean;

    xmlUrl: string;

    data: any[] = [];
    
    constructor(private router: Router,
        private route: ActivatedRoute,
        private backend: BackendService,
        private messageService: MessageService) {

        this.xmlUrl = this.route.snapshot.queryParamMap.get('url');
    }

    ngOnInit() {
    }

    loadData(event) {
        if (this.finished) return;

        var a = this;
        this.backend.post(url, {
            url: this.xmlUrl,
            limit: event['rows'],
            skip: event['first']
        }).subscribe(rs => {
            if (rs.success) {
                rs.data.forEach(d => {
                    a.data.push(d);
                })
            } else {
                a.finished = true;
            }
        });
    }
    
    
    quickview(product:any) {
        
    }


}
