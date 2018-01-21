import {Injectable} from '@angular/core';
import {Location, LocationStrategy, PathLocationStrategy} from '@angular/common';
import {HttpClient, HttpHeaders} from '@angular/common/http';
import {Observable} from 'rxjs/Observable';
import {of} from 'rxjs/observable/of';
import {catchError, map, tap} from 'rxjs/operators';

const httpOptions = {
    headers: new HttpHeaders({'Content-Type': 'application/json'})
};

export class DataMeta {
    total: number;
    page: number;
    pages: number;
    perpage: number;
    field: string;
    sort: string;
}

export class DataResponse {
    success: boolean;
    meta: DataMeta;
    data: any[];
}

@Injectable()
export class BackendService {

    emptyResp: DataResponse = new DataResponse();

    constructor(private http: HttpClient, private location: Location) {}

    getUrl(url: string): string {
        //return 'http://localhost/TradeTrackerDemo/dev/public/vendor/tradetracker' + url;
        return this.location.prepareExternalUrl(url);
    }

    post(url: string, body: any | null): Observable<DataResponse> {
        return this.http.post<DataResponse>(this.getUrl(url), body, httpOptions)
            .pipe(
            tap(_ => this.log(url, body)),
            catchError(this.handleError<DataResponse>(url, body, this.emptyResp))
            );
    }

    log(url: string, body: any | null): void {
        console.log("here passed");
    }

    handleError<T>(url: string, body: any | null, result?: T) {
        return (error: any): Observable<T> => {

            // TODO: send the error to remote logging infrastructure
            console.error(error); // log to console instead

            // TODO: better job of transforming error for user consumption
            //this.log(url, body);

            // Let the app keep running by returning an empty result.
            return of(result as T);
        };
    }
}
