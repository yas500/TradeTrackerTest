import {Component, OnInit, ViewEncapsulation} from '@angular/core';
import {Router} from '@angular/router';
import {FormArray, FormBuilder, FormGroup, Validators} from '@angular/forms';
import {MessageService} from 'primeng/components/common/messageservice';

@Component({
    selector: 'app-root',
    templateUrl: './app.component.html',
    styleUrls: ['./app.component.css'],
    providers: [MessageService],
    encapsulation: ViewEncapsulation.None
})
export class AppComponent implements OnInit {

    disabled: boolean;

    nForm: FormGroup;

    /// local storage url cache
    cached: any[];

    constructor(
        private fb: FormBuilder,
        private router: Router,
        private messageService: MessageService) {
    }

    ngOnInit() {
        this.nForm = this.fb.group({
            url: ['', [Validators.required]],
        });
    }

    submit() {
        if (this.nForm.valid) {
            this.disabled = false;
            this.router.navigate(['/results'], {queryParams: {url: this.nForm.controls['url'].value}});
            this.nForm.controls['url'].setValue('');
        }
    }
}
