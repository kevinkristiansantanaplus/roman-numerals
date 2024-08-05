import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { IResponse } from '../interfaces/IResponse';
import { IConverter } from '../interfaces/IConverter';

@Injectable({
  providedIn: 'root'
})
export class ConverterService {

  url: string = 'http://romannumerals-api.local:8000/api/'

  constructor(private http: HttpClient) { }

  getInRoman(decimal: number): Observable<IResponse<IConverter>> {

    return this.http.get<IResponse<IConverter>>(`${this.url}v1/numeral-roman/${decimal}`)

  }

  getInNumber(roman: string): Observable<IResponse<IConverter>> {

    return this.http.get<IResponse<IConverter>>(`${this.url}v1/roman-numeral/${roman}`)

  }

}