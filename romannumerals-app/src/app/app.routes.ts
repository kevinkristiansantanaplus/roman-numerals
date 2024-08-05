import { Routes } from '@angular/router';
import { ConverterComponent } from './converter/converter.component';

export const routes: Routes = [

    {
        path: '',
        pathMatch: 'full',
        redirectTo: 'converter'
    },
    {
        path: 'converter', 
        component: ConverterComponent
    }

];