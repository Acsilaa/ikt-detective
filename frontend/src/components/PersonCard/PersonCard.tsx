import type {Person} from "../../Types"
export type PCardT = {
    person: Person,
}
export default function PersonCard(props:PCardT){
    return (
    <a className="bg-white w-[200px] p-3 text-center rounded-[5px] flex-column shrink-0 hover:scale-110 transition-[.4s] hover:shadow-violet-600/35 hover:shadow-xl" href={props.person.role == "subject" ? `/subject/${props.person.id}` : `/detective/${props.person.id}`}>
        <p className="text-black font-semibold text-3xl grow-0">{props.person.name}</p>
        <p className="text-[16px] text-violet-600 grow-1">{props.person.attr.job}</p>
        <p className="text-black text-[16px] grow-0 align-bottom flex justify-center items-end">{props.person.role == "subject" ? 'Answers' : 'Questions'}: {props.person.attr.actionCount}</p>
    </a>
    )
}